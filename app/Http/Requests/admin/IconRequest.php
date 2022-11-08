<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class IconRequest extends FormRequest
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
            'name'=>"required|string",
            'link'=>"required|string",
            'tag'=>"required|string",
        ];
    }
    public function messages()
    {
        return [
          'name.required'=> trans("custom_validation.name_req"),
          'link.required'=> trans("custom_validation.link_req"),
          'tag.required' => trans("custom_validation.tag_req"),
          'name.string'  => trans("custom_validation.must_Str"),
          'link.string'  => trans("custom_validation.must_Str"),
          'tag.string'   => trans("custom_validation.must_Str"),
        ];
    }
}
