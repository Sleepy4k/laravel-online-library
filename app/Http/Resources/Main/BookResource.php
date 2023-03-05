<?php

namespace App\Http\Resources\Main;

use App\Http\Resources\Resource;

class BookResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => $this->image,
            'year' => $this->year,
            'description' => $this->description,
            'author' => new AuthorResource($this->author),
            'publisher' => new PublisherResource($this->publisher),
            'category' => new BookCategoryResource($this->category),
        ];
    }
}
