<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\Console\Event\ConsoleEvent;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'state' => $this->state,
            'postal_code' => $this->postal_code,
            'blogs' => BlogResource::collection($this->whenLoaded('blogs')),
        ];
        
    }
}
