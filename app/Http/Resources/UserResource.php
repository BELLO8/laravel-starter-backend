<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Services\HashIdService;
use Illuminate\Http\Resources\Json\JsonResource;

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
            "id" => (new HashIdService())->encode($this->id),
            "name" => $this->name,
            "last_name" => $this->last_name,
            "email" => $this->email,
            "phone" => $this->phone_number,
            "role" => ($this->roles)[0]->role,
        ];
    }
}
