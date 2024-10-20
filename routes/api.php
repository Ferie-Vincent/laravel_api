<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CompleteTaskController;

// Définit un groupe de routes avec le préfixe "V1".
Route::prefix("V1")->group(function () {
    // Définit une ressource API pour les tâches, utilisant le contrôleur TaskController.
    Route::apiResource("/tasks", TaskController::class);
    
    // Définit une route PATCH pour marquer une tâche comme complétée, utilisant le contrôleur CompleteTaskController.
    Route::patch("/tasks/{task}/complete", CompleteTaskController::class);
});

// Définit une route GET pour obtenir l'utilisateur authentifié.
Route::get('/user', function (Request $request) {
    // Retourne l'utilisateur authentifié.
    return $request->user();
})->middleware('auth:sanctum'); // Applique le middleware 'auth:sanctum' pour l'authentification.
