<?php
require_once 'vendor/autoload.php';
$faker = Faker\Factory::create();
for ($x = 0; $x <= 20; $x++) {
	echo $faker->email() . "\t" .  $faker->userName() . "\t" . $faker->password();
	echo "\n";
	sleep(1);
}
