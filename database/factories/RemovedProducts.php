<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RemovedProduct;

use Faker\Generator as Faker;

$factory->define(RemovedProduct::class, function (Faker $faker) {
    return [
        'product_id' =>  App\Product::all()->random()->id,
        'quantity' => $faker->numerify('##'),
        'cost_when_removed' => $faker->numerify('##'),
        'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now')

    ];
});
