<?php

namespace App\Models;

use CodeIgniter\Model;

class TypeModel extends Model
{
    protected $table = 'Type'; // Specifies the database table that this model should interact with.
    protected $primaryKey = 'type_id'; // Defines the primary key field of the table for CRUD operations.
    // Lists the fields that are allowed to be set using the model. This is for security and prevents mass assignment vulnerabilities.
    protected $allowedFields = ['restaurant_id', 'type', "description"];
    protected $returnType = 'array'; // Sets the default return type of the results. This model will return results as arrays.
}
