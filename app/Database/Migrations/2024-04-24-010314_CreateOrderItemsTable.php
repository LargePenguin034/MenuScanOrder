<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderItemsTable extends Migration
{
    public function up()
    {
                    // Define the Orders table
                    $this->forge->addField([
                        'item_no' => [
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                        ],
                        'order_id' => [
                            'type' => 'INT',
                            'constraint' => 11,
                        ],
                        'item_id' => [
                            'type' => 'INT',
                            'constraint' => 11,
                        ],
                        'amount' => [
                            'type' => 'INT',
                            'constraint' => 11,
                        ],                        
                    ]);

                    $this->forge->addKey('item_no', TRUE); // Set order_id as primary key
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
