<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
        $rules = [
            'email' => "required",
            'phone' => "required",
            'gpsLink' => "required",
            'sales' => "nullable",
            'rate' => "nullable",
            'ventures' => "nullable",
            'logo' =>validate_image(),
            'image' => validate_image(), 
        ];
        foreach (config('translatable.locales') as $locale) 
        {
            $rules += [$locale . '.name' => ['required']];
            $rules += [$locale . '.desc' => ['required']];
            $rules += [$locale . '.small_desc' => ['required']];
            $rules += [$locale . '.address' => ['required']];
            $rules += [$locale . '.formTo' => ['required']];
        }
        return $rules;
    }
    public function messages()
    {
        $trans =  [
            'email.required' => trans("custom_validation.email_req"),
            'phone.required' => trans("custom_validation.phone_req"),
            'gpsLink.required' => trans("custom_validation.link_req"),
            'image.image' => trans("custom_validation.img_image"),
            'logo.image' => trans("custom_validation.img_image"),
        ];
        foreach (config('translatable.locales') as $locale) {
            $trans  += [$locale . '.name.required' =>         trans('custom_validation.name_req')];
            $trans  += [$locale . '.desc.required' =>   trans('custom_validation.field_Req')];
            $trans  += [$locale . '.small_desc.required' => trans('custom_validation.field_Req')];
            $trans  += [$locale . '.address.required' => trans('custom_validation.field_Req')];
            $trans  += [$locale . '.formTo.required' => trans('custom_validation.field_Req')];
        }
        return $trans;
    }
}
