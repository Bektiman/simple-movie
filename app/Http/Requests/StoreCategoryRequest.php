<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //

            'name' => [
                'required',
                'string',
                'max:255',
                'unique:categories,name'
            ],
            // 'slug'=> 'required|url'
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
