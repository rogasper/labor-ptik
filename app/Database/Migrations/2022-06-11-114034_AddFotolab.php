<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFotolab extends Migration
{
    public function up()
    {
        $fields = [
            'foto_lab' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ]
        ];
        $this->forge->addColumn('labs', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('labs', 'foto_lab');
    }
}
