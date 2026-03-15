<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'bail|required|max:255',
            'content' => 'required|unique:posts,content,' . $this->input('id'),
            'author' => 'required|min:2|max:10',
            'published' => 'boolean'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'This field is required.',
            'content.required' => 'This field is required.',
            'author.required' => 'This field is required.'
        ];
    }
}
