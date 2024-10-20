<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use Illuminate\Http\Request;
use App\Models\Task;

class CompleteTaskController extends Controller
{
    /**
     * Gère la requête entrante.
     * 
     * @param Request $request La requête HTTP entrante.
     * @param Task $task L'instance de la tâche à mettre à jour.
     * @return TaskResource La ressource de la tâche mise à jour.
     */
    public function __invoke(Request $request, Task $task)  
    {
        // Met à jour l'attribut 'is_completed' de la tâche avec la valeur de la requête.
        $task->is_completed = $request->is_completed;
        
        // Sauvegarde les modifications de la tâche dans la base de données.
        $task->save();

        // Retourne la ressource de la tâche mise à jour.
        return TaskResource::make($task);
    }
}
