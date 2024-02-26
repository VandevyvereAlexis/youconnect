<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Générer un pseudo en combinant un nom et un prénom fictifs
            'pseudo' => fake()->name() . fake()->firstName(),

            // Utiliser une image par défaut pour chaque utilisateur
            'image' => 'user.jpg',

            // Générer une adresse email unique et sûre
            'email' => fake()->unique()->safeEmail(),

            // Définir la date actuelle comme date de vérification de l'email
            'email_verified_at' => now(),

            // Utiliser le mot de passe actuel ou générer un nouveau mot de passe haché
            'password' => static::$password ??= Hash::make('password'),

            // Générer un jeton de rappel aléatoire
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            // Ajouter une méthode pour définir l'email comme non vérifié
            'email_verified_at' => null,
        ]);
    }
}
