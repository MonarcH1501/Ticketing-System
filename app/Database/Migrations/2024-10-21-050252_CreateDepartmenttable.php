<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createdepartmenttable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
            'type'=>'INT',
            'constraint'     => 5,
            'unsigned'       => true,
        ],
        'name' => [
            'type'=>'VARCHAR',
            'constraint'     => '30',
        ]
        ]);
        
    $this->forge->addKey('id', true);

    $this->forge->createTable('department');
    }

    public function down()
    {
        $this->forge->dropTable('department');
    }
}
