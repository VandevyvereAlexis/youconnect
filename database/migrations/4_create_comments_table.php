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
        // Création de la table 'comments'
        Schema::create('comments', function (Blueprint $table) {
            // Colonnes de la table
            $table->id(); // Identifiant auto-incrémenté
            $table->text('content'); // Contenu du commentaire (texte)
            $table->string('image')->nullable(); // Chemin de l'image associée au commentaire (pouvant être nul)
            $table->string('tags')->nullable(); // Balises associées au commentaire (pouvant être nul)
            $table->timestamps(); // Horodatages de création et de mise à jour

            // Colonne 'post_id' avec contrainte de clé étrangère liée à la table 'posts'
            $table->foreignId('post_id')->constrained()->onDelete('cascade');

            // Colonne 'user_id' avec contrainte de clé étrangère liée à la table 'users'
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Suppression de la table 'comments' en cas de rollback de la migration
        Schema::dropIfExists('comments');
    }
};
