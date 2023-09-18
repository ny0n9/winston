<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedUsers extends Seeder
{
	public function run()
	{
		$data = [
			[
				'email' => 'master@winston.web.id',
				'username'  => 'master',
				'password_hash'  => setPassword('Sem64r4n9'),
				'active' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			],
			[
				'email' => 'admin@winston.web.id',
				'username'  => 'admin',
				'password_hash'  => setPassword('Sem64r4n9'),
				'active' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			],
			[
				'email' => 'umum@winston.lan',
				'username'  => 'umum',
				'active' => 1,
				'password_hash'  => setPassword('Sem64r4n9'),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			],
		];
		$this->db->table('users')->insertBatch($data);

		$faker = \Faker\Factory::create('id_ID');
		for ($x = 0; $x <= 100; $x++) {
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
