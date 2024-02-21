<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// Importation de la classe Seeder de Laravel
use Illuminate\Database\Seeder;

// Déclaration de la classe DatabaseSeeder, héritant de Seeder
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Appel des seeders spécifiés pour peupler la base de données
        $this->call([
            RoleSeeder::class, // Seeder pour les rôles
            UserSeeder::class, // Seeder pour les utilisateurs
            PostSeeder::class, // Seeder pour les publications
            CommentSeeder::class, // Seeder pour les commentaires
        ]);
    }
}
