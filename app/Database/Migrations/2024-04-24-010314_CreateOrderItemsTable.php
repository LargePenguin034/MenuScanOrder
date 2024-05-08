<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderItemsTable extends Migration
{
    public function up()
    {
                    // Define the Orders table
                    $this->forge->addField([
                        'order_id' => [
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                        ],
                        'item_name' => [
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                        ],
                    ]);

                    $this->forge->addKey('order_id', TRUE); // Set order_id as primary key
                    $this->forge->createTable('OrderItems'); // Create the Orders table
                //
        //
    }

    public function down()
    {
        //
        $this->forge->dropTable('Orders');
    }
}
