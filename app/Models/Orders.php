<?php

namespace App\Models;

use CodeIgniter\Model;

class Orders extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['client_id', 'product_id', 'quantity', 'status'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'client_id'  => 'required|integer|is_not_unique[clients.id]',
        'product_id' => 'required|integer|is_not_unique[products.id]',
        'quantity'   => 'required|integer|greater_than[0]',
    ];

    protected $validationMessages = [
        'client_id' => [
            'required'    => 'The Client field is required.',
            'integer'     => 'The Client field must be an integer.',
            'is_not_unique' => 'The specified Client does not exist.',
        ],
        'product_id' => [
            'required'    => 'The Product field is required.',
            'integer'     => 'The Product field must be an integer.',
            'is_not_unique' => 'The specified Product does not exist.',
        ],
        'quantity' => [
            'required'    => 'The Quantity field is required.',
            'integer'     => 'The Quantity field must be an integer.',
            'greater_than' => 'The Quantity must be greater than 0.',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
