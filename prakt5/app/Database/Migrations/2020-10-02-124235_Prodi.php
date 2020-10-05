<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prodi extends Migration
{
	private $table = 'prodi';
	public function up()
	{
		//kalau pas pertama kali create mau apa
		//membuat kolom pada tabel
		$this->forge->addField([
			'kode_prodi'          => [
					'type'           => 'VARCHAR',
					'constraint'     => '1',
			],
			'nama_prodi'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'ketua_prodi' => [
					'type'           => 'VARCHAR',
					'constraint'      => '100',
			],
		]);
		$this->forge->addKey('kode_prodi', true);	//primary key
		$this->forge->createTable($this->table);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//ex: drop table
		$this->forge->dropTable($this->table);
	}
}
