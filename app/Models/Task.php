<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    // Les attributs qui peuvent être assignés en masse.
    protected $fillable = ['name', 'priority_id'];

    /**
     * Définition de la relation entre la tâche et l'utilisateur.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        // Une tâche appartient à un utilisateur.
        return $this->belongsTo(User::class);
    }

    /**
     * Définition de la relation entre la tâche et la priorité.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function priority()
    {
        // Une tâche appartient à une priorité.
        return $this->belongsTo(Priority::class);
    }
}


