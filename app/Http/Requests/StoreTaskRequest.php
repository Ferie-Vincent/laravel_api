<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à faire cette requête.
     */
    public function authorize(): bool
    {
        // Autorise toujours cette requête.
        return true;
    }

    /**
     * Obtient les règles de validation qui s'appliquent à la requête.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Retourne les règles de validation pour les champs de la requête.
        return [
            'name' => 'required|string|max:255', // Le champ 'name' est requis, doit être une chaîne de caractères et ne doit pas dépasser 255 caractères.
            'priority_id' => 'nullable|exists:priorities,id', // Le champ 'priority_id' est optionnel, mais s'il est présent, il doit exister dans la table 'priorities'.
        ];
    }

    /**
     * Obtient les noms des attributs personnalisés pour les messages de validation.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        // Retourne les noms des attributs personnalisés.
        return [
            'priority_id' => 'Priority', // Le champ 'priority_id' sera affiché comme 'Priority' dans les messages de validation.
        ];
    }
}