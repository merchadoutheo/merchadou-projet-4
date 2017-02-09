<?php


$factory->define(App\Models\Billet::class, function (Faker\Generator $faker) {

    $titre = $faker->realText(30);
    return [
        'titre' => $titre,
        'contenu' => $faker->realText(6000),
        // 'urlImg' => $faker->imageUrl(),
        'statut' => mt_rand(0,1),
        'user_id' => 1,
        'slug' => str_slug($titre)
    ];
});

$factory->define(App\Models\Commentaire::class, function (Faker\Generator $faker) {

    return [
        'pseudo' => $faker->name,
        'contenu' => $faker->realText(40),
        'statut' => mt_rand(0,1),
        'billet_id' => mt_rand(1,25)
    ];
});