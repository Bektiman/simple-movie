<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexMovieRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search'=> 'nullable|string|max:50',
            'page'=> 'nullable|integer|min:1'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'page' => $this->page ? strip_tags(trim($this->page)) : 1,
            'search' => $this->search ? strip_tags(trim($this->search)) : ''
        ]);
    }
}
