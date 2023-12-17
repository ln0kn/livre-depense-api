<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChargeUtileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'frequence' => $this->periodisite,
            'ulid' => $this->id,
            'montant' => $this->montant,
            'quantite' => $this->quantite,            
            'article' => ArticleResource::make($this->whenLoaded('article')),
        ];
    }
}
