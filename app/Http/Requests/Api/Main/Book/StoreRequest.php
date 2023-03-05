<?php

namespace App\Http\Requests\Api\Main\Book;

use App\Http\Requests\ApiRequest;

class StoreRequest extends ApiRequest
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
            'title' => ['required', 'string', 'max:255', 'unique:books,title'],
            'image' => ['required', 'image', 'max:4096', 'mimes:jpeg,png,jpg', 'dimensions:min_width=100,min_height=100'],
            'year' => ['required', 'integer', 'min:1800', 'max:' . date('Y')],
            'description' => ['required', 'string', 'max:1000'],
            'author_id' => ['required', 'integer', 'exists:authors,id'],
            'category_id' => ['required', 'integer', 'exists:book_categories,id'],
            'publisher_id' => ['required', 'integer', 'exists:publishers,id'],
        ];
    }
}
