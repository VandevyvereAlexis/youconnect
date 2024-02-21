<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Cette méthode est utilisée pour enregistrer des services de l'application, mais actuellement vide.
        // Les services peuvent être définis ici pour être disponibles dans toute l'application.
        // Cependant, dans ce cas, la méthode est laissée vide car il n'y a rien à enregistrer pour l'instant.
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Cette méthode est appelée lors du démarrage de l'application.
        // Elle est utilisée pour effectuer des opérations de configuration globale, telles que définir la longueur par défaut des chaînes.

        // Définir la longueur par défaut des chaînes à 191 caractères.
        // Cela est spécifiquement utile pour MySQL avec l'encodage utf8mb4 afin d'éviter les erreurs de "clé trop longue" lors de la création d'index.
        // Cette configuration prévient les problèmes potentiels liés à la longueur des clés pour les colonnes de type 'string'.
        Schema::defaultStringLength(191);
    }
}
