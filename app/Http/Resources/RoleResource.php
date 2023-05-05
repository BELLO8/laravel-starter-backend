<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Services\HashIdService;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
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
            "role" => $this->role
        ];
    }
}
