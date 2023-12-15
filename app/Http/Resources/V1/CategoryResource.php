<?php

namespace App\Http\Resources\V1;

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
            'ulid'=> $this->id,
            'nom'=> $this->libelle,
            // 'articles' => ArticleResource::collection($this->whenLoaded('articles')),
        
        ];
    }
}
