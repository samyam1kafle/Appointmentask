<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidator extends FormRequest
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
            'role_id' => 'required',
            'image' => 'required',
            'gender' => 'required',
            'department_id' => 'required',
            'password' => 'confirmed | min:5 | max:15 ',
            'email' => 'required',
            'name' => 'required | min:3 | max:50'

        ];
    }
}
