<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class RequestServiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
           'name' => 'required|string|max:100|min:3',
           'phone' => 'required|string',
           'email' => 'required|email',
           'message' => 'required|string|max:500',
        ];
    }
}
