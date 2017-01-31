# Projet 4 OC

## Installation

Récupérer le code depuis Github:

`git clone https://github.com/merchadoutheo/merchadou-projet-4.git`

Installer les dépendances avec composer:

`composer install`

Configuration de l'application dans le fichier `.env`:

`cp .env.example .env`

Installer la base:

`php artisan migrate`

Insérer les données factices:

`php artisan db:seed`