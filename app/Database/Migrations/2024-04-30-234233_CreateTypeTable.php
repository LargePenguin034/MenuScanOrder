<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTypeTable extends Migration
{
    public function up()
    {
        //
            // Define the Order table
            $this->forge->addField([
                'restaurant_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                ],
                'type' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'description' => [
                    'type' => 'TEXT',
                ]
            ]);

            $this->forge->addKey('type', TRUE); // Set order_id as primary key
            $this->forge->createTable('Type'); // Create the Order table
    }

    public function down()
    {
        //
        $this->forge->dropTable('Type');
    }
}
