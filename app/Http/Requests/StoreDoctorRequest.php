<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDoctorRequest extends FormRequest
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
            'national_id' => ['required', 'size:14', Rule::unique('doctors', 'national_id')->ignore($this->doctor, 'national_id')->where(function ($query) {
                $query->where('national_id', '!=', $this->input('national_id'));
            })],
            'pharmacy_id' => ['required', 'exists:pharmacies,pharmacy_id'],
            'is_banned' => ['required'],
            'name' => ['required', 'min:3'],
            'email' => [
                Rule::unique('users', 'email')->ignore($this->user, 'email')->where(function ($query) {
                    $query->where('email', '!=', $this->input('email'));
                }),
                'required',
            ],
            'password' => ['required', 'min:6']
        ];
    }

    public function messages(): array
    {
        return [
            'national_id' => [
                'required' => 'The National ID is Required',
                'unique' => 'The National ID must be Unique',
                'size' => 'The National ID must Contain 14 Number'
            ],
            'name' => [
                'required' => 'The Name is Required',
                'min' => 'The Name must be larger than 3 Characters'
            ],
            'email' => [
                'required' => 'The Email is Required',
                'unique' => 'The Email must be Unique',
                'email' => 'The Email must be a valid Email'
            ],
            'password' => [
                'required' => 'The Password is Required',
                'min' => 'The Password must be larger than 6 Characters'
            ],

        ];
    }
}
