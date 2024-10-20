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
        // Modifie la table 'tasks' pour ajouter une colonne 'priority_id'.
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignId('priority_id') // Ajoute une colonne 'priority_id' de type clé étrangère.
                  ->nullable() // Rend la colonne 'priority_id' optionnelle.
                  ->after('is_completed') // Place la colonne après la colonne 'is_completed'.
                  ->constrained(); // Ajoute une contrainte de clé étrangère.
        });
    }

    /**
     * Annule les migrations.
     */
    public function down(): void
    {
        // Modifie la table 'tasks' pour supprimer la colonne 'priority_id'.
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['priority_id']); // Supprime la contrainte de clé étrangère sur 'priority_id'.
            $table->dropColumn('priority_id'); // Supprime la colonne 'priority_id'.
        });
    }
};
