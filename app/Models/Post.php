<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Je charge automatiquement l'utilisateur à chaque fois que je récupère un message. 
    protected $with = ['user'];

    // Nom de la fonction au singulier car 1 seul utilisateur en relation
    // Cardinalité 1.1
    public function user()
    {
        // Définit la relation "belongsTo" avec le modèle User
        return $this->belongsTo(User::class);
    }

    // Nom au pluriel car un message peut regrouper plusieurs commentaires
    // Cardinalité 0.n
    public function comments()
    {
        // Définit la relation "hasMany" avec le modèle Comment
        return $this->hasMany(Comment::class);
    }
}
