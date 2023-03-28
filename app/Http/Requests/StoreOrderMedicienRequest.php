<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderMedicienRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'medicine_name' => ['required'],
            'quantity'=> ['required', 'integer', 'min:1'],
        ];
    }
    public function messages()
    {
        return [
            'medicine_name.required' => 'medicine id is required',
            'quantity'=>[
                'required' => 'quantity is required',
                'integer' => 'quantity must be integer',
                'min' => 'quantity must be greater than 0',
            ]

        ];
    }
}