<?php

namespace App\Http\Requests\Api\Main\Book;

use App\Http\Requests\ApiRequest;

class UpdateRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('sanctum')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string', 'max:255', 'unique:books,title,' . $this->route('id')],
            'image' => ['nullable', 'image', 'max:4096', 'mimes:jpeg,png,jpg', 'dimensions:min_width=100,min_height=100'],
            'year' => ['nullable', 'integer', 'min:1800', 'max:' . date('Y')],
            'description' => ['nullable', 'string', 'max:1000'],
            'author_id' => ['nullable', 'integer', 'exists:authors,id'],
            'category_id' => ['nullable', 'integer', 'exists:book_categories,id'],
            'publisher_id' => ['nullable', 'integer', 'exists:publishers,id'],
        ];
    }
}
