<?php

namespace Database\Seeders;

// Importation du modèle Comment pour pouvoir créer des instances de commentaires
use App\Models\Comment;

// Importation de la classe WithoutModelEvents pour éviter que les événements de modèle ne soient déclenchés lors de l'insertion des données
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// Importation de la classe Seeder pour définir un seeder
use Illuminate\Database\Seeder;


class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Utilisation de la factory pour créer 20 commentaires et les insérer dans la base de données
        Comment::factory(20)->create();
    }
}
