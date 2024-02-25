<?php

namespace App\Models;

// Importation de différentes classes et traits nécessaires
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// Définition de la classe User qui étend la classe Authenticatable
class User extends Authenticatable
{
    // Utilisation des traits HasApiTokens, HasFactory et Notifiable
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Les attributs qui sont mass assignables.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Les attributs qui doivent être cachés lors de la sérialisation.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les attributs qui doivent être castés.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Définition d'une relation "posts" pour indiquer qu'un utilisateur peut avoir plusieurs posts
    // Le nom est au pluriel en raison de la cardinalité 0.n (un utilisateur peut avoir plusieurs posts)
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Définition d'une relation "comments" pour indiquer qu'un utilisateur peut avoir plusieurs commentaires
    // Le nom est au pluriel en raison de la cardinalité 0.n (un utilisateur peut avoir plusieurs commentaires)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Définition d'une relation "role" pour indiquer qu'un utilisateur a un seul rôle
    // Le nom est au singulier en raison de la cardinalité 1.1 (un utilisateur a un seul rôle)
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Fonction pour vérifier si un utilisateur est un administrateur
    public function isAdmin()
    {
        // Retourne true si le rôle de l'utilisateur a un ID égal à 2 (assumant que 2 est l'ID pour le rôle admin)
        return $this->role_id == 2;
    }
}
