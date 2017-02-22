<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
/*$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->unique()->userName,
        'password' => $password ?: $password = bcrypt('secret'),
        'type' => $faker->randomElement(['SuperUsuario','Administrador','Invitado']),
        'activo' => $faker->boolean,
        'direccion' => $faker->address,
        'remember_token' => str_random(10),
    ];
});*/

$factory->define(App\Producto::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->name,
        'descripcion' => $faker->text,
        'descripcion_corta' => substr($faker->text,0,150),
        'precio' => $faker->randomFloat($nbMaxDecimals = 3, $min = 2, $max = 200),
        'imagen' => 'http://programacion.net/files/article/20151030111039_laravel-logo-white.png',
        'activo' => $faker->boolean,
        'categorias_id' => \App\Categoria::all()->random()->id,
    ];
});
