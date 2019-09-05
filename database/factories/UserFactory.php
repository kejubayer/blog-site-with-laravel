<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'email'=>'kej@gmail.com',
        'password'=>bcrypt('123456'),
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    $category=$faker->name;
    return [
        'name'=>$category,
        'slug'=>str_slug($category)
    ];
});

$factory->define(Post::class, function (Faker $faker) {
    $category=$faker->name;
    return [
        'user_id'=>1,
        'category_id'=>random_int(1,4),
        'title'=>$faker->realText(32),
        'content'=>$faker->realText(),
        'thumbnail_path'=>'sample_post.jpg'
    ];
});
