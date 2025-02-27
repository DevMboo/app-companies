<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddClients extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint'     => 100,
                'null' => true,
            ],
            'corporate_reason' => [
                'type'       => 'VARCHAR',
                'constraint'     => 100,
                'null' => true,
            ],
            'cpf' => [
                'type' => 'VARCHAR',
                'constraint'     => 11,
                'null' => true,
            ],
            'cnpj' => [
                'type' => 'VARCHAR',
                'constraint'     => 18,
                'null' => true,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
                'on update' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('clients');
    }

    public function down()
    {
        //
        $this->forge->dropTable('clients');
    }
}
