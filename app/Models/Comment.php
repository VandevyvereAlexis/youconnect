<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Définition d'une relation "belongsTo" avec le modèle Post
    // Un commentaire appartient à un seul article (Post)
    // Cardinalité : 1 (Comment) vers 1 (Post)
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Définition d'une relation "belongsTo" avec le modèle User
    // Un commentaire appartient à un seul utilisateur (User)
    // Cardinalité : 1 (Comment) vers 1 (User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
