<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PriorityResource extends JsonResource
{
    /**
     * Transforme la ressource en un tableau.
     *
     * @param Request $request La requête HTTP entrante.
     * @return array<string, mixed> Le tableau représentant la ressource.
     */
    public function toArray(Request $request): array
    {
        // Retourne les attributs de la ressource sous forme de tableau.
        return [
            'id' => $this->id, // L'identifiant de la priorité.
            'name' => $this->name, // Le nom de la priorité.
            'description' => $this->description, // La description de la priorité.
        ];
    }
}