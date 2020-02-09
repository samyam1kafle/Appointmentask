<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceDetailsValidator extends FormRequest
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
            'User_id' => 'required|integer',
            'booked_id' => 'required|integer',
            'cancel_id' => 'required|integer',
            'reschedule_id' => 'required|integer',
            'complete_id' => 'required|integer',
            'booking_id' => 'required|integer',
        ];
    }
}
