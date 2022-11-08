<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'work_id' =>"required",
            'image'=>validate_image(),
        ];
        foreach (config('translatable.locales') as $locale)
        {
            $rules += [$locale . '.name' => ['required']];
            $rules += [$locale . '.desc' => ['required']];
        }

        return $rules;
    }
    public function messages()
    {
        $trans =  [
            'image.image' => trans("custom_validation.img_image") ,
            'work_id.required' => trans("custom_validation.identifier_req") ,

        ];
           foreach (config('translatable.locales') as $locale)
           {
       
            $trans  += [$locale . '.name.required' => trans('custom_validation.name_req') ];
            $trans  += [$locale . '.desc.required' => trans('custom_validation.desc_req') ];

           }
        return $trans ;
    }
}
