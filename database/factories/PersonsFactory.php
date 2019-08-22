<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
	return [
		'first_name' => $faker->firstName,
		'last_name'  => $faker->lastName,
		'title'      => $faker->jobTitle,
		'company'    => $faker->company,
		'phone'      => $faker->phoneNumber,
		'email'      => $faker->safeEmail,
		'address'    => $faker->streetAddress,
		'address_2'  => $faker->secondaryAddress,
		'city'       => $faker->city,
		'state'      => $faker->stateAbbr,
		'zip_code'   => $faker->postcode,
		'photo'      => $faker->imageUrl('200', '200', 'cats'),
	];
});
