<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedUsers extends Seeder
{
	public function run()
	{
		$faker = \Faker\Factory::create('id_ID');
		for ($x = 0; $x <= 25; $x++) {
			$data = [];
			$data['email'] = $faker->email();
			$data['username'] = $faker->userName();
			$data['active'] = 1;
			$data['password_hash'] = setPassword('Sem64r4n9');
			$data['created_at'] = date('Y-m-d H:i:s');
			$data['updated_at'] = date('Y-m-d H:i:s');
			$this->db->table('users')->insert($data);
		}
	}
}
