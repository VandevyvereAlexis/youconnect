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
        // Création de la table 'post'
        Schema::create('posts', function (Blueprint $table) {
            // Colonnes de la table
            $table->id(); // Identifiant auto-incrémenté
            $table->text('content'); // Colonne pour le contenu du post (type texte)
            $table->string('image')->nullable(); // Colonne pour le chemin de l'image du post (pouvant être nul)
            $table->string(('tags')); // Colonne pour les tags du post (chaîne de caractères)
            $table->timestamps(); // Horodatages de création et de mise à jour

            // Colonne 'user_id' avec clé étrangère liée à la table 'users' et suppression en cascade
            $table->foreignid('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Suppression de la table 'post' en cas de rollback de la migration
        Schema::dropIfExists('posts');
    }
};
