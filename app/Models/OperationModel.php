<?php

namespace App\Models;

use CodeIgniter\Model;

class OperationModel extends Model
{
    protected $table            = 'operations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    
    protected $allowedFields    = [
        'client_id', 
        'client_destinataire_id', 
        'type_operation_id', 
        'montant', 
        'frais', 
        'date_operation'
    ];

    protected $useTimestamps = false;
}
