<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => "required",
            'email' => "required|email",
            'phone' => "required",
            'subject' => "required",
            'message' => "required",
            'g_recaptcha_response' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return
            [
                'name.required' => trans("custom_validation.name_req"),
                'subject.required' => trans("custom_validation.sub_req"),
                'email.required' => trans("custom_validation.email_req"),
                'phone.required' => trans("custom_validation.phone_req"),
                'message.required' => trans("custom_validation.msg_req"),
            ];
    }
}
