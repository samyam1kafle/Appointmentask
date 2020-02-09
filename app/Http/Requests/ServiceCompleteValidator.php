<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceCompleteValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'service_booked_id' => 'required|integer',
            'service_reschedule_id' => 'required|integer',
            'status' => 'required',
            'complete_date' => 'required|date',
            'complete_time' => 'required|date_format:H:i',
        ];
    }
}
