<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'image'=>'image|required',
        ];
    }
    public function messages()
    {
        return [
            'image.image' => trans("custom_validation.img_image") ,
            'image.required'=> trans("custom_validation.img_req") 
        ];
      
    }
}
