<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    /**
     * Affiche une liste des ressources.
     */
    public function index()
    {
        // Retourne une collection de toutes les tâches sous forme de ressources.
        return TaskResource::collection(Task::all());
    }

    /**
     * Enregistre une nouvelle ressource dans le stockage.
     */
    public function store(StoreTaskRequest $request)
    {
        // Crée une nouvelle tâche avec les données validées de la requête.
        $task = Task::create($request->validated());
        
        // Charge la relation 'priority' pour la tâche.
        $task->load('priority');
        
        // Retourne la ressource de la tâche créée.
        return TaskResource::make($task);
    }

    /**
     * Affiche la ressource spécifiée.
     */
    public function show(Task $task)
    {
        // Retourne la ressource de la tâche spécifiée.
        return TaskResource::make($task);
    }

    /**
     * Met à jour la ressource spécifiée dans le stockage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        // Met à jour la tâche avec les données validées de la requête.
        $task->update($request->validated());
        
        // Retourne la ressource de la tâche mise à jour.
        return TaskResource::make($task);
    }

    /**
     * Supprime la ressource spécifiée du stockage.
     */
    public function destroy(Task $task)
    {
        // Supprime la tâche spécifiée.
        $task->delete();
        
        // Retourne une réponse sans contenu.
        return response()->noContent();
    }
}