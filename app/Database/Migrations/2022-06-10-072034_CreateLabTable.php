<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLabTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_lab' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'kategori_lab' => [
                'type' => 'ENUM',
                'constraint' => ['Software Engineering', 'Multimedia Studio', 'Computer Network and Instrumentation']
            ],
            'kapasitas' => [
                'type' => 'INT',
                'constraint' => '5'
            ],
            'harga' => [
                'type' => 'INT'
            ],
            'fasilitas' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'deleted_at datetime',
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('labs');
    }

    public function down()
    {
        $this->forge->dropTable('labs');
    }
}
