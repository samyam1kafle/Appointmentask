<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingValidator extends FormRequest
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
            'User_id' => 'required|integer',
            'service_id' => 'required|integer',
            'booking_date' => 'required|date',
            'booking_time' => 'required|time',
            'status' => 'required',
        ];
    }
}
