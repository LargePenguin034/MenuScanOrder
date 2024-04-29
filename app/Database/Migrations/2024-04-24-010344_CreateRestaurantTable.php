<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRestaurantTable extends Migration
{
    public function up()
    {
        //
                    // Define the Restaurant table
                    $this->forge->addField([
                        'restaurant_id' => [
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE,
                        ],
                        'name' => [
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                        ],
                        'time_created' => [
                            'type' => 'TIMESTAMP',
                        ],
                    ]);
                                        
                    $this->forge->addKey('restaurant_id', TRUE); // Set restaurant_id as primary key
                    $this->forge->createTable('Restaurant'); // Create the Restaurant table
    }

    public function down()
    {
        //
        $this->forge->dropTable('Restaurant');
    }
}
