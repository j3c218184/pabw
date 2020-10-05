<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
	private $table = 'mahasiswa';
	public function up()
	{
		$this->forge->addField([
			'nim'		=> [
					'type'           => 'VARCHAR',
					'constraint'     => '9',
			],
			'nama'		=> [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'jenis_kelamin' => [
					'type'           => 'ENUM',		//enumerasi?
					'constraint'     => ['Pria', 'Wanita'],
					'default'		 => 'Pria',
			],
			//Kalau sesuatu yang bisa bertambah atau berkurang bisa dibuat tabel sendiri --- tabel referensi
			'agama'		=> [
					'type'			 => 'INT',
					'constraint'	 => 11,
					'unsigned'		 => TRUE,
			],
			'alamat'	=> [
					'type'			 => 'TEXT',
			],
			'foto'		=> [
					'type'			 => 'TEXT',
			],
			'tempat_lahir'	=> [
					'type'			 => 'VARCHAR',
					'constraint'	 => '100',
			],
			'tanggal_lahir'	=> [
					'type'			 => 'DATE',
			],
		]);
		$this->forge->addKey('nim', true);	//primary key
		$this->forge->addForeignKey('agama', 'agama', 'kode_agama', 'CASCADE', 'CASCADE');
		$this->forge->createTable($this->table);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable($this->table);
	}
}
