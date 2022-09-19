<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class ServiceStoreRequest extends FormRequest
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
            'title' => 'required|string|max:80',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'tags' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Create a title with 15 characters minimum. Your title should have at least 4 words',
            'category_id.required' => 'Category & Sub-category can\'t be empty.',
            'sub_category_id.required' => 'Sub-category can\'t be empty.',
            'tags.required' => 'Tag list must contain at least 1 tag.',
        ];
    }
}
