<?php

namespace Database\Factories;

use App\Models\Priority;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Définit l'état par défaut du modèle.
     *
     * @return array<string, mixed> Le tableau représentant l'état par défaut du modèle.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(), // Génère une phrase aléatoire pour le nom de la tâche.
            'is_completed' => rand(0, 1), // Définit aléatoirement si la tâche est complétée (0 ou 1).
            'priority_id' => rand(1, 4) === 0 ? NULL : Priority::pluck('id')->random() // Définit aléatoirement l'ID de la priorité ou NULL.
        ];
    }
}
