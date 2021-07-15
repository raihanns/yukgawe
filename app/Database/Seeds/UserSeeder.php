<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'name' => 'admin',
				'email' => 'admin@admin.com',
				'password' => password_hash('admin', PASSWORD_BCRYPT),
				'image' => 'default.jpg',
				'role_id' => '1',
				'is_active' => '1',
				'date_created' => '1625548103',
			],
			[
				'name' => 'user',
				'email' => 'user@user.com',
				'password' => password_hash('user', PASSWORD_BCRYPT),
				'image' => 'default.jpg',
				'role_id' => '2',
				'is_active' => '1',
				'date_created' => '1625548103',
			],

		];
		$this->db->table('user')->insertBatch($data);
	}
}
