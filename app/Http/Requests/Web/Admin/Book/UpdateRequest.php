<?php

namespace App\Http\Requests\Web\Admin\Book;

use App\Http\Requests\WebRequest;

class UpdateRequest extends WebRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255', 'unique:books,title,' . $this->route('book')],
            'image' => ['nullable', 'image', 'max:4096', 'mimes:jpeg,jpg,png', 'dimensions:min_width=100,min_height=100'],
            'old_image' => ['nullable', 'string', 'max:255'],
            'year' => ['required', 'integer', 'min:1', 'max:' . date('Y') + 1],
            'description' => ['required', 'string'],
            'author_id' => ['required', 'integer', 'exists:authors,id'],
            'category_id' => ['required', 'integer', 'exists:book_categories,id'],
            'publisher_id' => ['required', 'integer', 'exists:publishers,id'],
        ];
    }
}
