<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderTable extends Migration
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
            'users_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 5,
            ],
            'labs_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 5,
            ],
            'tanggal_sewa' => [
                'type' => 'DATETIME'
            ],
            'start_time' => [
                'type' => 'TIME'
            ],
            'end_time' => [
                'type' => 'TIME'
            ],
            'total_harga' => [
                'type' => 'INT',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'lunas', 'cancel']
            ],
            'deleted_at datetime',
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('id', true);
        $this->forge->addForeignKey('users_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('labs_id', 'labs', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
