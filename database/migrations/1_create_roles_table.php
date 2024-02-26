<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Utilisation d'une classe anonyme pour définir la migration
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Création de la table 'roles'
        Schema::create('roles', function (Blueprint $table) {
            // Colonnes de la table
            $table->id(); // Identifiant auto-incrémenté
            $table->string('role'); // Colonne pour stocker le nom du rôle
            $table->timestamps(); // Horodatages de création et de mise à jour
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Suppression de la table 'roles' en cas de rollback de la migration
        Schema::dropIfExists('roles');
    }
};
