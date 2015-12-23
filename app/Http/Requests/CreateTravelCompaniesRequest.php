<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateTravelCompaniesRequest extends Request
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
            'name' =>'required|unique:travel_companies',
	        'email'=>'required|email|unique:travel_companies',
	        'phone' => 'required|min:10',
			'password'  => 'required'
        ];
    }
}
