<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal;
use Auth;
use Cart;
use DB;
use App\Order;
use App\ItemOrder;
use App\User;
use Response;
use Redirect;
use App\OnlineBank;
use Bouncer;

class PaypalController extends Controller
{
	protected $taxrate = .1;
    private $_apiContext;
    public function __construct()
    {
        $this->middleware('auth');
        $this->_apiContext = PayPal::ApiContext(
            config('services.paypal.client_id'),
            config('services.paypal.secret'));

        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'service.EndPoint' => 'https://api.sandbox.paypal.com',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE',
        ));
    }
    public function indexPaypal()
    {
        echo '<pre>';

        $payments = Paypal::getAll(array('count' => 1, 'start_index' => 0), $this->_apiContext);

        dd($payments);
    }
    // Extend this in Order Controller to use this function
    public function getPaypalLink()
    {
        
        return $this->paypal_payment($this->getPayer(), $this->redirectUrls(), $this->getTransaction());
    }

    public function getDone(Request $request)
    {	
        $id = $request->get('paymentId');
        $token = $request->get('token');
        $payer_id = $request->get('PayerID');

        $payment = PayPal::getById($id, $this->_apiContext);

        $paymentExecution = PayPal::PaymentExecution();

        $paymentExecution->setPayerId($payer_id);
        $executePayment = $payment->execute($paymentExecution, $this->_apiContext);

    // Clear the shopping cart, write to database, send notifications, etc.
    if($payment->state === "approved")
    {
    	// return $payment->payer->payer_info->phone;

    	DB::beginTransaction();
        $userID = \Auth::user()->id; 
        $cart = Cart::content();
        $order = new Order();
        $order->user_id = $userID;
        $order->status = 'paid';
        $order->method = 'App\BDO';
        $order->shipment_fee = $this->getShippingFee();
        $order->sub_total = $this->getSubtotal();
        $order->tax = $this->getTax($this->getSubtotal());
        $order->total = $this->getTotal();

        $mop = new OnlineBank();
        $mop->name = 'Paypal';
        $mop->amount =  $this->getTotal();
        $mop->transaction_no = $id;
        $mop->account_name = $payment->payer->payer_info->email;
        $mop->account_id = $payment->payer->payer_info->phone;
        $mop->date_paid = \Carbon\Carbon::now()->format('d-m-Y');
        $mop->save();
        $mop->orderPayment()->save($order);
        foreach ($cart as $item) {
            $itemOrder = new ItemOrder();
            $itemOrder->product_id = $item->id;
            $itemOrder->name = $item->name;
            $itemOrder->qty = $item->qty;
            $itemOrder->price = $item->price;
            $options = array(
            "size" => $item->options->has('size') ? $item->options->size : '',
            "weight" => $item->options->has('weight') ? $item->options->weight : '',
            "volume" => $item->options->has('volume') ? $item->options->volume : '',
            "color" => $item->options->has('color') ? $item->options->color : ''
            );
            $itemOrder->options =$options;
            $order->itemOrders()->save($itemOrder);
        }
        $user = User::find($userID);
        Bouncer::allow($user)->to('remove-order', $order);
        Bouncer::allow($user)->to('edit-order', $order);
        Bouncer::allow($user)->to('view-itemOrder', ItemOrder::class);
        try {
            if (!$order && !$mop && !$itemOrder) {
                throw new \Exception('Order Creation Failed!');
            }
        } catch (\Exception $e) {
            DB::rollback();

            $errors = [
            'ExceptionError' => $e->getMessage()
            
            ];

            return response()->json(['success' => false, 'errors' => $errors], 400); // Failed Creation
        }

        // Order Successfully Created
        DB::commit();
        Cart::destroy();
        
    // Thank the user for the purchase
    return view('pages.checkout_done')->with(compact('id', 'token', 'payer_id', 'payment', 'order', 'mop', 'itemOrder'));
    }
    }

    public function getCancel()
    {
        // Curse and humiliate the user for cancelling this most sacred payment (yours)
    return view('checkout_cancel');
    }

    protected function getPayer()
    {
        $payer = PayPal::Payer();
        $payer->setPaymentMethod('paypal');

        return $payer;
    }

    protected function items()
    {
        $cart = Cart::content();
        $count = 0;
        foreach ($cart as $item) {
            $itemOrder[$count] = PayPal::item();
            $itemOrder[$count]->setName($item->name)
                      ->setCurrency('PHP')
                      ->setQuantity($item->qty)
                      ->setTax($item->subtotal * .1)
                      ->setPrice($item->price);
            ++$count;
        }

        return $itemOrder;
    }

    protected function getShippingFee()
    {
        return 160;
    }
    protected function getTaxRate()
    {
    	return $this->taxrate;
    }
    protected function getTax($subtotal)
    {
        return round($subtotal * $this->getTaxRate());
    }
    protected function getSubtotal()
    {
        return Cart::total();
    }
    protected function getDetails()
    {
        $details = PayPal::details();
        $details->setShipping($this->getShippingFee())
                ->setTax($this->getTax($this->getSubtotal()))
                //total of items prices
                ->setSubtotal($this->getSubtotal());

        return $details;
    }
    protected function getTotal()
    {
        return $this->getSubtotal() + $this->getTax($this->getSubtotal()) + $this->getShippingFee();
    }
    protected function getItemList()
    {
        $itemList = PayPal::itemList();
        $itemList->setItems($this->items());
    // $shipping_address = $this->shippingAddress();
    // $itemList->setShippingAddress($shipping_address);
    return $itemList;
    }
    protected function getAmount()
    {
        $amount = PayPal::amount();
        $amount->setCurrency('PHP')
                ->setTotal($this->getTotal())
                ->setDetails($this->getDetails());

        return $amount;
    }
    protected function getTransaction()
    {
        $transaction = PayPal::Transaction();
        $transaction->setAmount($this->getAmount());
        $transaction->setItemList($this->getItemList());
        $transaction->setInvoiceNumber(uniqid());

        return $transaction;
    }
    
// This method will produce your Payment Link
protected function paypal_payment($payer, $redirectUrls, $transaction)
{

    $payment = PayPal::Payment();
    $payment->setIntent('sale');
    $payment->setPayer($payer);
    $payment->setRedirectUrls($redirectUrls);
    $payment->setTransactions(array($transaction));
    $response = $payment->create($this->_apiContext);
    $redirectUrl = $response->links[1]->href;

    return $redirectUrl;
}
    protected function redirectUrls()
    {
        $redirectUrls = PayPal:: RedirectUrls();
        $redirectUrls->setReturnUrl(action('PaypalController@getDone'));
        $redirectUrls->setCancelUrl(action('PaypalController@getCancel'));

        return $redirectUrls;
    }
    protected function shippingAddress()
    {
        $profile = Auth::user()->profile;
        $shipping_address = PayPal::ShippingAddress();
        $shipping_address->setCity($profile->city);
// Get Country Code By Country Name
$code = array_search($profile->country, $this->countryCode());
        $shipping_address->setCountryCode($code);
        $shipping_address->setPostalCode($profile->zip_code);
        $shipping_address->setLine1($profile->address);
// Get State Code
$state = array_search($profile->province_state, $this->stateCode());
        $shipping_address->setState($state);
        $shipping_address->setRecipientName($profile->first_name.' '.$profile->last_name);
        $shipping_address->setPhone($profile->contact_no);

        return $shipping_address;
    }

    protected function countryCode()
    {
        return $countrycodes = array(
  'AF' => 'Afghanistan',
  'AX' => 'Åland Islands',
  'AL' => 'Albania',
  'DZ' => 'Algeria',
  'AS' => 'American Samoa',
  'AD' => 'Andorra',
  'AO' => 'Angola',
  'AI' => 'Anguilla',
  'AQ' => 'Antarctica',
  'AG' => 'Antigua and Barbuda',
  'AR' => 'Argentina',
  'AU' => 'Australia',
  'AT' => 'Austria',
  'AZ' => 'Azerbaijan',
  'BS' => 'Bahamas',
  'BH' => 'Bahrain',
  'BD' => 'Bangladesh',
  'BB' => 'Barbados',
  'BY' => 'Belarus',
  'BE' => 'Belgium',
  'BZ' => 'Belize',
  'BJ' => 'Benin',
  'BM' => 'Bermuda',
  'BT' => 'Bhutan',
  'BO' => 'Bolivia',
  'BA' => 'Bosnia and Herzegovina',
  'BW' => 'Botswana',
  'BV' => 'Bouvet Island',
  'BR' => 'Brazil',
  'IO' => 'British Indian Ocean Territory',
  'BN' => 'Brunei Darussalam',
  'BG' => 'Bulgaria',
  'BF' => 'Burkina Faso',
  'BI' => 'Burundi',
  'KH' => 'Cambodia',
  'CM' => 'Cameroon',
  'CA' => 'Canada',
  'CV' => 'Cape Verde',
  'KY' => 'Cayman Islands',
  'CF' => 'Central African Republic',
  'TD' => 'Chad',
  'CL' => 'Chile',
  'CN' => 'China',
  'CX' => 'Christmas Island',
  'CC' => 'Cocos (Keeling) Islands',
  'CO' => 'Colombia',
  'KM' => 'Comoros',
  'CG' => 'Congo',
  'CD' => 'Zaire',
  'CK' => 'Cook Islands',
  'CR' => 'Costa Rica',
  'CI' => 'Côte D\'Ivoire',
  'HR' => 'Croatia',
  'CU' => 'Cuba',
  'CY' => 'Cyprus',
  'CZ' => 'Czech Republic',
  'DK' => 'Denmark',
  'DJ' => 'Djibouti',
  'DM' => 'Dominica',
  'DO' => 'Dominican Republic',
  'EC' => 'Ecuador',
  'EG' => 'Egypt',
  'SV' => 'El Salvador',
  'GQ' => 'Equatorial Guinea',
  'ER' => 'Eritrea',
  'EE' => 'Estonia',
  'ET' => 'Ethiopia',
  'FK' => 'Falkland Islands (Malvinas)',
  'FO' => 'Faroe Islands',
  'FJ' => 'Fiji',
  'FI' => 'Finland',
  'FR' => 'France',
  'GF' => 'French Guiana',
  'PF' => 'French Polynesia',
  'TF' => 'French Southern Territories',
  'GA' => 'Gabon',
  'GM' => 'Gambia',
  'GE' => 'Georgia',
  'DE' => 'Germany',
  'GH' => 'Ghana',
  'GI' => 'Gibraltar',
  'GR' => 'Greece',
  'GL' => 'Greenland',
  'GD' => 'Grenada',
  'GP' => 'Guadeloupe',
  'GU' => 'Guam',
  'GT' => 'Guatemala',
  'GG' => 'Guernsey',
  'GN' => 'Guinea',
  'GW' => 'Guinea-Bissau',
  'GY' => 'Guyana',
  'HT' => 'Haiti',
  'HM' => 'Heard Island and Mcdonald Islands',
  'VA' => 'Vatican City State',
  'HN' => 'Honduras',
  'HK' => 'Hong Kong',
  'HU' => 'Hungary',
  'IS' => 'Iceland',
  'IN' => 'India',
  'ID' => 'Indonesia',
  'IR' => 'Iran, Islamic Republic of',
  'IQ' => 'Iraq',
  'IE' => 'Ireland',
  'IM' => 'Isle of Man',
  'IL' => 'Israel',
  'IT' => 'Italy',
  'JM' => 'Jamaica',
  'JP' => 'Japan',
  'JE' => 'Jersey',
  'JO' => 'Jordan',
  'KZ' => 'Kazakhstan',
  'KE' => 'KENYA',
  'KI' => 'Kiribati',
  'KP' => 'Korea, Democratic People\'s Republic of',
  'KR' => 'Korea, Republic of',
  'KW' => 'Kuwait',
  'KG' => 'Kyrgyzstan',
  'LA' => 'Lao People\'s Democratic Republic',
  'LV' => 'Latvia',
  'LB' => 'Lebanon',
  'LS' => 'Lesotho',
  'LR' => 'Liberia',
  'LY' => 'Libyan Arab Jamahiriya',
  'LI' => 'Liechtenstein',
  'LT' => 'Lithuania',
  'LU' => 'Luxembourg',
  'MO' => 'Macao',
  'MK' => 'Macedonia, the Former Yugoslav Republic of',
  'MG' => 'Madagascar',
  'MW' => 'Malawi',
  'MY' => 'Malaysia',
  'MV' => 'Maldives',
  'ML' => 'Mali',
  'MT' => 'Malta',
  'MH' => 'Marshall Islands',
  'MQ' => 'Martinique',
  'MR' => 'Mauritania',
  'MU' => 'Mauritius',
  'YT' => 'Mayotte',
  'MX' => 'Mexico',
  'FM' => 'Micronesia, Federated States of',
  'MD' => 'Moldova, Republic of',
  'MC' => 'Monaco',
  'MN' => 'Mongolia',
  'ME' => 'Montenegro',
  'MS' => 'Montserrat',
  'MA' => 'Morocco',
  'MZ' => 'Mozambique',
  'MM' => 'Myanmar',
  'NA' => 'Namibia',
  'NR' => 'Nauru',
  'NP' => 'Nepal',
  'NL' => 'Netherlands',
  'AN' => 'Netherlands Antilles',
  'NC' => 'New Caledonia',
  'NZ' => 'New Zealand',
  'NI' => 'Nicaragua',
  'NE' => 'Niger',
  'NG' => 'Nigeria',
  'NU' => 'Niue',
  'NF' => 'Norfolk Island',
  'MP' => 'Northern Mariana Islands',
  'NO' => 'Norway',
  'OM' => 'Oman',
  'PK' => 'Pakistan',
  'PW' => 'Palau',
  'PS' => 'Palestinian Territory, Occupied',
  'PA' => 'Panama',
  'PG' => 'Papua New Guinea',
  'PY' => 'Paraguay',
  'PE' => 'Peru',
  'PH' => 'Philippines',
  'PN' => 'Pitcairn',
  'PL' => 'Poland',
  'PT' => 'Portugal',
  'PR' => 'Puerto Rico',
  'QA' => 'Qatar',
  'RE' => 'Réunion',
  'RO' => 'Romania',
  'RU' => 'Russian Federation',
  'RW' => 'Rwanda',
  'SH' => 'Saint Helena',
  'KN' => 'Saint Kitts and Nevis',
  'LC' => 'Saint Lucia',
  'PM' => 'Saint Pierre and Miquelon',
  'VC' => 'Saint Vincent and the Grenadines',
  'WS' => 'Samoa',
  'SM' => 'San Marino',
  'ST' => 'Sao Tome and Principe',
  'SA' => 'Saudi Arabia',
  'SN' => 'Senegal',
  'RS' => 'Serbia',
  'SC' => 'Seychelles',
  'SL' => 'Sierra Leone',
  'SG' => 'Singapore',
  'SK' => 'Slovakia',
  'SI' => 'Slovenia',
  'SB' => 'Solomon Islands',
  'SO' => 'Somalia',
  'ZA' => 'South Africa',
  'GS' => 'South Georgia and the South Sandwich Islands',
  'ES' => 'Spain',
  'LK' => 'Sri Lanka',
  'SD' => 'Sudan',
  'SR' => 'Suriname',
  'SJ' => 'Svalbard and Jan Mayen',
  'SZ' => 'Swaziland',
  'SE' => 'Sweden',
  'CH' => 'Switzerland',
  'SY' => 'Syrian Arab Republic',
  'TW' => 'Taiwan, Province of China',
  'TJ' => 'Tajikistan',
  'TZ' => 'Tanzania, United Republic of',
  'TH' => 'Thailand',
  'TL' => 'Timor-Leste',
  'TG' => 'Togo',
  'TK' => 'Tokelau',
  'TO' => 'Tonga',
  'TT' => 'Trinidad and Tobago',
  'TN' => 'Tunisia',
  'TR' => 'Turkey',
  'TM' => 'Turkmenistan',
  'TC' => 'Turks and Caicos Islands',
  'TV' => 'Tuvalu',
  'UG' => 'Uganda',
  'UA' => 'Ukraine',
  'AE' => 'United Arab Emirates',
  'GB' => 'United Kingdom',
  'US' => 'United States',
  'UM' => 'United States Minor Outlying Islands',
  'UY' => 'Uruguay',
  'UZ' => 'Uzbekistan',
  'VU' => 'Vanuatu',
  'VE' => 'Venezuela',
  'VN' => 'Viet Nam',
  'VG' => 'Virgin Islands, British',
  'VI' => 'Virgin Islands, U.S.',
  'WF' => 'Wallis and Futuna',
  'EH' => 'Western Sahara',
  'YE' => 'Yemen',
  'ZM' => 'Zambia',
  'ZW' => 'Zimbabwe',
);
    }
    protected function stateCode()
    {
        return $states = array(
    'AL' => 'Alabama',
    'AK' => 'Alaska',
    'AZ' => 'Arizona',
    'AR' => 'Arkansas',
    'CA' => 'California',
    'CO' => 'Colorado',
    'CT' => 'Connecticut',
    'DE' => 'Delaware',
    'DC' => 'District of Columbia',
    'FL' => 'Florida',
    'GA' => 'Georgia',
    'HI' => 'Hawaii',
    'ID' => 'Idaho',
    'IL' => 'Illinois',
    'IN' => 'Indiana',
    'IA' => 'Iowa',
    'KS' => 'Kansas',
    'KY' => 'Kentucky',
    'LA' => 'Louisiana',
    'ME' => 'Maine',
    'MD' => 'Maryland',
    'MA' => 'Massachusetts',
    'MI' => 'Michigan',
    'MN' => 'Minnesota',
    'MS' => 'Mississippi',
    'MO' => 'Missouri',
    'MT' => 'Montana',
    'NE' => 'Nebraska',
    'NV' => 'Nevada',
    'NH' => 'New Hampshire',
    'NJ' => 'New Jersey',
    'NM' => 'New Mexico',
    'NY' => 'New York',
    'NC' => 'North Carolina',
    'ND' => 'North Dakota',
    'OH' => 'Ohio',
    'OK' => 'Oklahoma',
    'OR' => 'Oregon',
    'PA' => 'Pennsylvania',
    'RI' => 'Rhode Island',
    'SC' => 'South Carolina',
    'SD' => 'South Dakota',
    'TN' => 'Tennessee',
    'TX' => 'Texas',
    'UT' => 'Utah',
    'VT' => 'Vermont',
    'VA' => 'Virginia',
    'WA' => 'Washington',
    'WV' => 'West Virginia',
    'WI' => 'Wisconsin',
    'WY' => 'Wyoming',
);
    }
}
