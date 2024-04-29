<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderTable extends Migration
{
    public function up()
    {
            // Define the Order table
            $this->forge->addField([
                'order_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ],
                'status' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'table' => [
                    'type' => 'INT',
                    'constraint' => '10',
                ],
                'time_created' => [
                    'type' => 'TIMESTAMP',
                ],
                'time_completed' => [
                    'type' => 'TIMESTAMP',
                ],
            ]);

            $this->forge->addKey('order_id', TRUE); // Set order_id as primary key
            $this->forge->createTable('Order'); // Create the Order table
        
    }

    public function down()
    {
        //
        $this->forge->dropTable('Order');
    }
}
