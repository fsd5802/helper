<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
        $rules=[
        ];
        foreach (config('translatable.locales') as $locale)
        {
            $rules += [$locale . '.name' => ['required']];
            $rules += [$locale . '.skills' => ['required']];
            $rules += [$locale . '.description' => ['required']];
        }

        return $rules;
    }
    public function messages()
    {
        $trans =  [

        ];
           foreach (config('translatable.locales') as $locale)
           {
       
            $trans  += [$locale . '.name.required' => trans('custom_validation.name_req') ];
            $trans  += [$locale . '.skills.required' => trans('custom_validation.skills_req') ];
            $trans  += [$locale . '.description.required' => trans('custom_validation.desc_req') ];

           }
        return $trans ;
    }
}
