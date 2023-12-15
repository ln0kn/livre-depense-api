<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConstanteResource extends JsonResource
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
            'seuil'=>$this->depense_mensuel,
            'montantDepense'=>$this->seuil_alerte,
        ];
    }
}
