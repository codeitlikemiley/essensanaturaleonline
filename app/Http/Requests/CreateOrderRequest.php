<?php

namespace App\Http\Requests;

class CreateOrderRequest extends Request
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
                'mop' => 'in:Bank|required',
                'method' => 'in:pickup|required',
                'name' => 'in:BDO|required',



                
        ];
    }
    public function messages()
    {
        return [
            'mop.in'           => 'Invalid Mode of Payment!',
            'mop.required'     => 'Mode of Payment is Required',
            'method.in'           => 'Invalid Shipping Method!',
            'method.required'   => 'Shipping Method is Required!',
            'name.in'      =>'Payment Gateway Invalid',
            'name.required' => 'Payment Gateway Required',
        ];
    }
}
