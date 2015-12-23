<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RentalRequest extends Request
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
            'customer_name' => 'required',
            'customer_email'=> 'required',
            'customer_phone_number'=>'required',
            'departing_address' => 'required',
            'departing_date' => 'required',
            'departing_time' => 'required',
            'destination_address'=>'required',
            'number_of_bus'=>'required|integer'
        ];
    }
}
