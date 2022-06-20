<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFotolab extends Migration
{
    public function up()
    {
        $fields = [
            'kode' => [
                'type' => 'VARCHAR',
                'constraint' => '120'
            ]
        ];
        $this->forge->addColumn('orders', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('orders', 'kode');
    }
}
