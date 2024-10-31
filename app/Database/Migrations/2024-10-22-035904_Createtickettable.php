<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        // Membuat tabel tickets
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'department_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);

        // Menentukan primary key
        $this->forge->addKey('id', true);

        // Menambahkan foreign key untuk user_id
        $this->forge->addForeignKey('user_id', 'user', 'id', 'CASCADE', 'SET NULL');
        
        // Menambahkan foreign key untuk department_id
        $this->forge->addForeignKey('department_id', 'department', 'id', 'CASCADE', 'SET NULL');

        // Membuat tabel
        $this->forge->createTable('tickets');
    }

    public function down()
    {
        // Menghapus tabel tickets jika rollback
        $this->forge->dropTable('tickets');
    }
}
