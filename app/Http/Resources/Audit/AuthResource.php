<?php

namespace App\Http\Resources\Audit;

use App\Http\Resources\Resource;

class AuthResource extends Resource
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
            'log_name' => $this->log_name,
            'description' => $this->description,
            'subject' => ($this->subject_id ?: 'null') . ' | ' . ($this->subject_type ?: 'null'),
            'event' => $this->event ?: 'null',
            'causer' => ($this->causer_id ?: 'null') . ' | ' . ($this->causer_type ?: 'null'),
            'properties' => $this->properties
        ];
    }
}
