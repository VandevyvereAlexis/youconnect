<?php

namespace Database\Seeders;

// Importation du modèle Post pour pouvoir créer des instances de posts
use App\Models\Post;

// Importation de la classe WithoutModelEvents pour éviter que les événements de modèle ne soient déclenchés lors de l'insertion des données
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// Importation de la classe Seeder pour définir un seeder
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Utilisation de la classe Post pour créer des faux posts
        // La méthode factory(20) crée 20 instances de Post avec des données aléatoires
        // Ensuite, la méthode create() les insère dans la base de données
        Post::factory(20)->create();
    }
}
