<?php

namespace App\Http\Requests;

class UserStoreRequest extends BaseFormRequest
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
            'name'=>'required|string|max:50',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:4'
        ];
    }

    public function messages(){

        return [
          'email.required'=>'E-poçt sahəsi doldurulmalıdı',
            'name.required'=>'Ad sahəsi doldurulmalıdır',
            'password.required'=>'Parol sahəsi doldurulmalıdır',
            'email.unique'=>'Bu e-poçt artıq bazada var'
        ];

    }

}
