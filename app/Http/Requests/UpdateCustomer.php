<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomer extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'adres' => 'required',
            'placename'=> 'required',
            'postalcode' => 'required',
            'item'   => [
                'array',
            ],
            'detial.*' => [
                'integer',
            ],
            'detial'   => [
                'required',
                'array',
            ],
            'value.*' => [
                'string',
            ],
                'value'   => [
                'required',
                'array',
            ],
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => 'First name must have a value',
            'last_name.required' => 'Last name must have a value',
        ];
    }
}
