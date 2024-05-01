<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table = 'Orders'; // Specifies the database table that this model should interact with.
    protected $primaryKey = 'order_id'; // Defines the primary key field of the table for CRUD operations.
    // Lists the fields that are allowed to be set using the model. This is for security and prevents mass assignment vulnerabilities.
    protected $allowedFields = ['status', 'restaurant_id', 'table', "time_created", "time_completed"];
    protected $returnType = 'array'; // Sets the default return type of the results. This model will return results as arrays.
}
