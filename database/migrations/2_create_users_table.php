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
        // Création de la table 'users'
        Schema::create('users', function (Blueprint $table) {
            // Colonnes de la table
            $table->id(); // Identifiant auto-incrémenté
            $table->string('pseudo')->unique(); // Pseudo unique
            $table->string('image')->nullable(); // Chemin de l'image (pouvant être nul)
            $table->string('email')->unique(); // Adresse e-mail unique
            $table->timestamp('email_verified_at')->nullable(); // Horodatage de vérification de l'e-mail (pouvant être nul)
            $table->string('password'); // Mot de passe
            $table->rememberToken(); // Token de rappel pour la fonction "Se souvenir de moi"
            $table->timestamps(); // Horodatages de création et de mise à jour

            // Colonne 'role_id' avec clé étrangère liée à la table référencée
            $table->foreignId('role_id')->default(1)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Suppression de la table 'users' en cas de rollback de la migration
        Schema::dropIfExists('users');
    }
};


