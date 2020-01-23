<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class todoValidator extends FormRequest
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
            'User_id' =>'required',
            'title' => 'required|string',
            'description' =>'required|',
            'assignedDate' =>'required|date',
            'CompletedDate' =>'required|date',
            'assignedTo' =>'required|string',
            'requestedBy' =>'required|string',
            'DeadLine' =>'required|date',
            'status' =>'required|integer',

        ];
    }
}
