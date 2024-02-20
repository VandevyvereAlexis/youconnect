<?php

use Illuminate\Support\Str;

return [



    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Choix de la connexion de base de données par défaut pour toutes les opérations.
    | Par défaut, 'mysql' est utilisé, mais vous pouvez changer cela ici.
    |
    */
    'default' => env('DB_CONNECTION', 'mysql'),



    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Configurations des différentes connexions de base de données.
    | Laravel prend en charge plusieurs connexions simultanées.
    |
    | Toutes les opérations de base de données dans Laravel sont effectuées via PDO en PHP,
    | assurez-vous donc d'avoir le pilote pour votre base de données spécifique installé.
    |
    */
    'connections' => [



        /*
        |--------------------------------------------------------------------------
        | SQLite Database
        |--------------------------------------------------------------------------
        |
        | Configuration spécifique à la base de données SQLite.
        |
        */
        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],



        /*
        |--------------------------------------------------------------------------
        | MySQL Database
        |--------------------------------------------------------------------------
        |
        | Configuration spécifique à la base de données MySQL.
        | Utilisation du moteur de stockage InnoDB par défaut.
        |
        */
        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => "InnoDB",
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],



        'pgsql' => [
            /*
            |--------------------------------------------------------------------------
            | PostgreSQL Database
            |--------------------------------------------------------------------------
            |
            | Configuration spécifique à la base de données PostgreSQL.
            |
            */
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],



        'sqlsrv' => [
            /*
            |--------------------------------------------------------------------------
            | SQL Server Database
            |--------------------------------------------------------------------------
            |
            | Configuration spécifique à la base de données SQL Server.
            |
            */
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            // 'encrypt' => env('DB_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),
        ],

    ],



    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | Table utilisée pour stocker les informations sur les migrations.
    | Cela aide à déterminer quelles migrations ont déjà été exécutées dans la base de données.
    |
    */
    'migrations' => 'migrations',



    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Configurations pour les bases de données Redis.
    | Laravel facilite l'utilisation de Redis pour diverses tâches.
    |
    */
    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
