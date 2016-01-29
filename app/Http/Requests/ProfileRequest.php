<?php

namespace App\Http\Requests;

class ProfileRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'contact_no'             => array('required','regex:/(^0|[89]\d{2}-\d{3}\-?\d{4}$)|(^0|[89]\d{2}\d{3}\d{4}$)|(^63[89]\d{2}-\d{3}-\d{4}$)|(^63[89]\d{2}\d{3}\d{4}$)|(^[+]63[89]\d{2}\d{3}\d{4}$)|(^[+]63[89]\d{2}-\d{3}-\d{4}$)/i'),
            'address'             => 'required',
            'city' => 'required',
            'province_state' => 'required',
            'zip_code' => 'required',
            'country' => 'required',
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
            'mobile_no.required'               => 'Mobile No. is Required!',
            'mobile_no.regex'                  => 'Not a Valid Mobile Phone No!',
            'address.required'             => 'Address is Required For Shipping Products!',
            'city.required'             => 'City is Required For Shipping Products!',
            'province_state.required'                  => 'Province/State is Required For Shipping Products!',
            'zip_code.required' => 'Zip Code is Required For Shipping Products!',
            'country.required'  => 'Country is Required For Shipping Products!'
        ];
    }
}
