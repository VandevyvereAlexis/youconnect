<?php

// Définition du namespace dans lequel se trouve la classe RoleSeeder.
namespace Database\Seeders;

// Importation de la classe WithoutModelEvents, qui peut être utilisée pour désactiver les événements de modèle lors du processus de seeding.
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// Importation de la classe Seeder, qui est la classe de base pour toutes les classes Seeder de Laravel.
// Les classes Seeder contiennent la logique pour remplir la base de données avec des données de test.
use Illuminate\Database\Seeder;

// Importation du modèle Role depuis le namespace App\Models.
// Cela permet d'utiliser le modèle Role pour interagir avec la table des rôles dans la base de données.
use App\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Création d'un rôle 'user' dans la table des rôles.
        Role::create([
            'role' => 'user'
        ]);

        // Création d'un rôle 'admin' dans la table des rôles.
        Role::create([
            'role' => 'admin'
        ]);
    }
}
