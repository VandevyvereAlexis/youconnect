<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Assigner un post aléatoire (entre 1 et le nombre total de posts dans la base de données)
            'post_id' => rand(1, Post::count()),

            // Générer un paragraphe de texte aléatoire pour le contenu du commentaire
            'content' => $this->faker->paragraph(),

            // Assigner un utilisateur aléatoire (entre 1 et le nombre total d'utilisateurs dans la base de données)
            'user_id' => rand(1, User::count()),

            // Utiliser une image par défaut avec un numéro aléatoire entre 1 et 5
            'image' => 'default_picture_' . rand(1,5) . '.jpg',

            // Générer une chaîne de mots-clés aléatoires (3 mots)
            'tags' => $this->faker->words(3, true),
        ];
    }
}
