<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
        'email' =>"required|email",
        'phone' =>"required|numeric",
        'product_id' =>"required",
        'price' =>"required|numeric",
        ];
    }
    public function messages()
    {
      return
      [
          'name.required' => trans("custom_validation.name_req"),
          'phone.required' => trans("custom_validation.phone_req"),
          'email.required' => trans("custom_validation.email_req"),
          'product_id.required' => trans("custom_validation.product_req"),
          'price.required' => trans("custom_validation.msg_req"),
      ];
    }
    
}
