<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' =>"required",
            'password' =>"required",
            'email'=>"required|email|unique:users",
            'type'=>"required",
        ];
    }
    public function messages()
    {
        return [
            'name.required' => trans("custom_validation.name_req") ,
            'password.required' => trans("custom_validation.pass_req") ,
            'email.required' => trans("custom_validation.email_req") ,
            'email.unique' => trans("custom_validation.email_unique"),
            'type.required' => trans("custom_validation.role_req") ,
        ];
    }
}
