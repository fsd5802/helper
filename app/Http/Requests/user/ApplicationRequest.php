<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => "required",
            'email' => "required|email",
            'phone' => "required|numeric",
            'cv' => "required|mimes:pdf|max:900",
        ];
    }

    public function messages()
    {
        return [
                'name.required' => trans("custom_validation.name_req"),
                'phone.required' => trans("custom_validation.phone_req"),
                'email.required' => trans("custom_validation.email_req"),
                'cv.required' => trans("custom_validation.cv_req"),
            ];
    }
}
