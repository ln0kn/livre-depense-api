<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepenseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'nom'=>$this->designation,
            'montant'=>$this->montant,
            'quantite'=>$this->quantite,
            'dateAchat'=>$this->paid_date,
            'article_ulid'=>$this->article_id,
        ];
    }
}
