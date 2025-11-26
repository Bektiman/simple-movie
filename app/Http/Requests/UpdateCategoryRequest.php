<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'name')->ignore($this->category)
            ],
        ];
    }
    protected function sanitize(){
        $this->merge([
            'name' => strip_tags(trim($this->name)),
            // 'slug' => strip_tags(trim($this->slug)),
        ]);
    }
    public function messages(){
        return [

            'name.unique' => 'Nama category sudah ada, silakan gunakan nama lain.',
            'name.required' => 'Nama category wajib diisi.',
        ];
    }
}
