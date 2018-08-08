<?php

use Faker\Generator as Faker;

$factory->define(App\Topic::class, function (Faker $faker) {
    $items = [1, 2, 3, 4];
    shuffle($items);

    $num1 = rand(1, 99);
    $num2 = rand(1, 99);

    return [
        'topic'           => "$num1 x $num2 = ?",
        'opt' . $items[0] => $num1 * $num2,
        'ans'             => $items[0],
        'opt' . $items[1] => $num1 + $num2,
        'opt' . $items[2] => $num1 . $num2,
        'opt' . $items[3] => $num1 . $num2 . $num2,
    ];
});
