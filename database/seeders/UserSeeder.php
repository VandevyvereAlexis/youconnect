<?php

namespace Database\Seeders;

// Importation de la classe WithoutModelEvents qui peut être utilisée pour désactiver les événements de modèle lors du processus de seeding.
// Cela peut être utile pour améliorer les performances lors de l'insertion de données massives.
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// Importation de la classe Seeder, qui est la classe de base pour toutes les classes Seeder de Laravel.
// Les classes Seeder contiennent la logique pour remplir la base de données avec des données de test.
use Illuminate\Database\Seeder;

// Importation du modèle User depuis le namespace App\Models.
// Cela permet d'utiliser le modèle User pour interagir avec la table des utilisateurs dans la base de données.
use App\Models\User;

// Importation de la façade Hash, qui fournit des méthodes pour le hachage de mots de passe.
// Utile ici pour hacher les mots de passe des utilisateurs avant de les stocker dans la base de données.
use Illuminate\Support\Facades\Hash;

// Importation de la classe Str (String), qui fournit des fonctions utiles pour manipuler les chaînes de caractères.
// Ici, utilisé pour générer un jeton de rappel aléatoire.
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Création de l'administrateur
        User::create([
            'pseudo'            => 'admin', // Pseudo de l'administrateur
            'password'          => Hash::make('Admin2024!'), // Mot de passe hashé de l'administrateur
            'email'             => 'admin@admin.fr', // Email de l'administrateur
            'email_verified_at' => now(), // Date de vérification de l'email (actuelle)
            'remember_token'    => Str::random(10), // Jeton de rappel généré aléatoirement
            'role_id'           => 2, // ID du rôle de l'administrateur (2 pour admin)
        ]);

        // Création d'un utilisateur test
        User::create([
            'pseudo'            => 'user', // Pseudo de l'utilisateur test
            'password'          => Hash::make('User2024!'), // Mot de passe hashé de l'utilisateur test
            'email'             => 'user@user.fr', // Email de l'utilisateur test
            'email_verified_at' => now(), // Date de vérification de l'email (actuelle)
            'remember_token'    => Str::random(10), // Jeton de rappel généré aléatoirement
            'role_id'           => 1, // ID du rôle de l'utilisateur test (1 pour user)
        ]);

        // Création de 8 users aléatoires
        User::factory(8)->create(); // Utilise la factory pour créer 8 utilisateurs aléatoires
    }
}
