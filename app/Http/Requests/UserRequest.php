<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
             'name'=>'required|min:3',
            'avatar'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'email' =>'required|email', 
                
        ];
    }



     public function messages()
{
     return [
           'name'=>'Veuillez saisir au moins 3cara',
           'avatar' =>'le champ titre est requis',               
             'required'=>'le champ es requis'
      ];
}

}
