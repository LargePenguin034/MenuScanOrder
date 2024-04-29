<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMenuTable extends Migration
{
    public function up()
    {
            // Define the Menu table
            $this->forge->addField([
                'restaurant_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'description' => [
                    'type' => 'TEXT',
                ],
                'type' => [
                    'type' => 'TEXT',
                ],
                'price' => [
                    'type' => 'FLOAT',
                    'constraint' => '20',
                ],
                'kj' => [
                    'type' => 'INT',
                    'constraint' => '20',
                ],
                'image' => [
                    'type' => 'BLOB',
                ],
            ]);
            
            $this->forge->addKey('name', TRUE); // Set item_id as primary key
            $this->forge->createTable('Menu'); // Create the Menu table
        //
    }

    public function down()
    {
        //
        $this->forge->dropTable('Menu');
    }
}
