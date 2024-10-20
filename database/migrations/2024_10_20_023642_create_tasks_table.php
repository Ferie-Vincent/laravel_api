<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute les migrations.
     */
    public function up(): void
    {
        // Crée la table 'tasks' avec les colonnes spécifiées.
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Colonne 'id' auto-incrémentée.
            $table->string('name'); // Colonne 'name' de type chaîne de caractères.
            $table->boolean('is_completed')->default(false); // Colonne 'is_completed' de type booléen avec une valeur par défaut de 'false'.
            $table->timestamps(); // Colonnes 'created_at' et 'updated_at' pour les horodatages.
        });
    }

    /**
     * Annule les migrations.
     */
    public function down(): void
    {
        // Supprime la table 'tasks' si elle existe.
        Schema::dropIfExists('tasks');
    }
};
