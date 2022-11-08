<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
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
        $rules=[];
        foreach (config('translatable.locales') as $locale)
        {
            $rules += [$locale . '.name' => ['required']];
        }

        return $rules;
    }
    public function messages()
    {
        $trans =  [];
           foreach (config('translatable.locales') as $locale)
           {
       
            $trans  += [$locale . '.name.required' => trans('custom_validation.name_req') ];
                 
            }
        return $trans ;
    }
}
