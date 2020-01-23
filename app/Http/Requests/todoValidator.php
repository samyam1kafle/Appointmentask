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
            'title' => 'required|string|min:5|max:50',
            'description' =>'required|min:10',
            'assignedDate' =>'required|date',
            'CompletedDate' =>'required|date',
            'assignedTo' =>'required|string|min:3|max:50',
            'requestedBy' =>'required|string|min:3|max:50',
            'DeadLine' =>'required|date',
            'status' =>'required|integer',

        ];
    }
}
