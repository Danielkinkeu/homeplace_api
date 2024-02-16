<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "name"=>$this->name,
            "items"=>$this->ads->count(),
            'type'=>$this->type,
            'id'=>$this->id,
            'creation_date'=>$this->created_at
        ];
    }
}
