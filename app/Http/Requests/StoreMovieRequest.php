<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'title'=> 'required|string|max:255',
            'description'=> 'required',
            'release_date'=> 'required|date',
            'cast'=> 'required',
            'genre'=> 'required|string|max:255',
            'image-url'=> 'required|url'
        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'title' => strip_tags(trim($this->title)),
            'description' => strip_tags(trim($this->description)),
            'cast' => strip_tags(trim($this->cast)),
            'genre' => strip_tags(trim($this->genre)),
            'image-url' => filter_var(trim($this->{'image-url'}), FILTER_SANITIZE_URL),
        ]);
    }
    // Digunakan untuk melakukan ovveride function error messages
    public function messages(){
        return [

            'title.required' => 'Judul film tidak boleh kosong',
            'description.required' => 'Deskripsi film tidak boleh kosong',
            'cast.required' => 'Cast tidak boleh kosong',
            'genre.required' => 'Genre tidak boleh kosong',
            'image-url.required' => 'Link gambar tidak boleh kosong'


        ];
    }


}
