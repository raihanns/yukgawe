<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsers extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 20,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '128',
			],
			'email'       => [
				'type'       => 'VARCHAR',
				'constraint' => '128',
			],
			'password'       => [
				'type'       => 'VARCHAR',
				'constraint' => '128',
			],
			'image'       => [
				'type'       => 'VARCHAR',
				'constraint' => '128',
			],
			'role_id'       => [
				'type'       => 'INT',
				'constraint' => '11',
			],
			'is_active'       => [
				'type'       => 'INT',
				'constraint' => '1',
			],
			'date_created'       => [
				'type'       => 'INT',
				'constraint' => '11',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('user');
	}

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
