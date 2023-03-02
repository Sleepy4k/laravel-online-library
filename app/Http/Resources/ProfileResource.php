<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class ProfileResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'grade' => $this->grade->name
        ];
    }
}
