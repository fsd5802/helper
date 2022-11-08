<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $image = request()->isMethod('put') ? 'nullable|max:8000' : 'required|max:8000';
        $rules = [
            'image'     =>  $image,
            'price'     => 'required',
            'count'     => 'required',
        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name' => ['required', 'string']];
            $rules += [$locale . '.description' => ['required']];
        }
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'image.required' => trans('product.image_required'),
            'price.required' => trans('product.price_required'),
            'count.required' => trans('product.count_required'),
        ];
        foreach (config('translatable.locales') as $locale) {
            $messages += [$locale . '.name.required' => trans('product.name_required_' . $locale)];
            $messages += [$locale . '.description.required' => trans('product.desc_required_' . $locale)];
        }
        return $messages;
    }
}
