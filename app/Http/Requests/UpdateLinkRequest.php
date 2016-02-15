<?php

namespace App\Http\Requests;

class UpdateLinkRequest extends Request
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
                'links.*.link' => array('unique:links,link', 'required', 'min:8', 'max:30', 'regex:/^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$/'),
                'links.*.id' => 'exists:links,id|required',



                
        ];
    }
    public function messages()
    {
        return [
            'links.*.link.unique'           => 'Link :value Name Already Exist!',
            'links.*.link.required'     => 'Link Name is Empty!',
            'links.*.link.min'           => 'Link Name Should Be More than 8 Characters!',
            'links.*.link.max'   => 'Link Name Exceeded Allowable Character Limit of 30!',
            'links.*.link.regex'      =>'Link Name Has an Invalid Character Present!',
            'links.*.id.exists' => 'Link ID Does Not Exist!',
            'links.*.id.required' => 'Link ID is Missing!',
        ];
    }
}
