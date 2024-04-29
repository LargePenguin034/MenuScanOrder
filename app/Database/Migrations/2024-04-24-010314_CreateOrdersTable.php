<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrdersTable extends Migration
{
    public function up()
    {
                    // Define the Orders table
                    $this->forge->addField([
                        'order_id' => [
                            'type' => 'INT',
                            'constraint' => 11,
                        ],
                        'restaurant_id' => [
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                        ],
                        'item_name' => [
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                        ],
                    ]);

                    $this->forge->createTable('Orders'); // Create the Orders table
                //
        //
    }

    public function down()
    {
        //
        $this->forge->dropTable('Orders');
    }
}
