<?php

namespace App\Http\Requests;

class SubmitReceiptInfoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'order_id'      => 'required|exists:orders,id|numeric',
            'transaction_no' => 'required',
            'account_name'      => 'required',
            'account_id'        => 'required',
            'amount'        => 'required|numeric',
            'date_paid'     => array('required', 'regex:/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/'),
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'order_id.required'               => 'No Order Has Been Specified!',
            'order_id.exists'               => 'Order Id Does Not Exist!',
            'order_id.numeric'               => 'Order Id Should Be Numeric!',
            'transaction_no.required'       => 'Transaction No is Required',
            'account_name.required'         => 'Account Name / Sender Name is Required',
            'account_id.required'           => 'Account ID / Mobile NO. is Required',
            'amount.required'               => 'How Much Did You Deposited?',
            'amount.numeric'                => 'Opps The Amount Should Be Numeric!',
            'date_paid.required'            => 'When Did You Paid your Order?',
            'date_paid.regex'                => 'Date Provided is Invalid!',
            
        ];
    }
}
