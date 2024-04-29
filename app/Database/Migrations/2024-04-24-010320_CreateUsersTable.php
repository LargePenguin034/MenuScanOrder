<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
                    // Define the Users table
                    $this->forge->addField([
                        'user_id' => [
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                        ],
                        'username' => [
                            'type' => 'varchar',
                            'constraint' => 255,
                        ],
                        'password' => [
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                        ],
                        'password_hash' => [
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                        ],
                        'auth_token' => [
                            'type' => 'VARCHAR',
                            'constraint' => '255',
                        ],
                        'time_created' => [
                            'type' => 'TIMESTAMP',
                        ],
                        'last_login' => [
                            'type' => 'TIMESTAMP',
                        ],
                        
                    ]);
                    
                    $this->forge->addKey('user_id', TRUE); // Set item_id as primary key
                    $this->forge->createTable('Users'); // Create the User table
                //
    }

    public function down()
    {
        //
        $this->forge->dropTable('Users');
    }
}
