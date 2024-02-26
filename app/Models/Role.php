<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // La classe Role étend la classe de base Model d'Eloquent
    use HasFactory;

    // Définition d'une relation "users" pour indiquer qu'un rôle peut avoir plusieurs utilisateurs
    // Le nom est au pluriel en raison de la cardinalité 1.n (un rôle peut avoir plusieurs utilisateurs)
    public function users()
    {
        // Utilisation de la méthode hasMany pour déclarer une relation de type "un rôle a plusieurs utilisateurs"
        // La classe User est associée à cette relation
        return $this->hasMany(User::class);
    }
}
