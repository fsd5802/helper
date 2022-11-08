<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
            'price' => "required",
        ];
        foreach (config('translatable.locales') as $locale) 
        {
            $rules += [$locale . '.name' => ['required']];
            $rules += [$locale . '.checkeddec' => ['required']];
            $rules += [$locale . '.uncheckeddec' => ['required']];
        }
        return $rules;
    }
    public function messages()
    {
        $trans =  [
            'price.required' => trans("custom_validation.identifier_req"),
        ];
        foreach (config('translatable.locales') as $locale) {
            $trans  += [$locale . '.name.required' =>         trans('custom_validation.name_req')];
            $trans  += [$locale . '.checkeddec.required' =>   trans('custom_validation.field_Req')];
            $trans  += [$locale . '.uncheckeddec.required' => trans('custom_validation.field_Req')];
        }
        return $trans;
    }
}
