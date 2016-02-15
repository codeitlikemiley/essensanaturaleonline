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
                'link.*' => array('unique:links,link', 'required', 'min:8', 'max:30', 'regex:/^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$/'),
                'lid.*' => 'exists:links,id|required',



                
        ];
    }
    public function messages()
    {
      $messages = [];
      foreach($this->request->get('links') as $key => $val)
      {
        $messages['links.'.$key.'.link'.'unique'] = 'The field labeled "Link '.$key + 1 .'" must be Unique';
      }
      return $messages;
        
    }
}
