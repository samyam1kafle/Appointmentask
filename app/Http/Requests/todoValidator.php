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
            'CompletedDate' =>'nullable',
            'assignedTo' =>'required|integer',
            'requestedBy' =>'required|integer',
            'reassignedto'=>'nullable|integer',
            'DeadLine' =>'required|date',
            'status' =>'required|boolean',
            'remarks'=>'nullable',

        ];
    }
}
