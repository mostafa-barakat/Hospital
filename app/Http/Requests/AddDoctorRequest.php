<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDoctorRequest extends FormRequest
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

        $rule = 'required|image|mimes:png,jpeg,jpg,svg';
        if($this->method() == 'PUT') {
            $rule = 'nullable|image|mimes:png,jpeg,jpg,svg';
        }
        return [
            'name' => 'required',
            'specialty' => 'required',
            'phone' => 'required',
            'image' => $rule,
        ];
    }
}
