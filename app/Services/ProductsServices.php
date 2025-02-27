<?php

namespace App\Services;

use App\Models\Products;

class ProductsServices {

    protected Products $model;

    public function __construct() {
        $this->model = new Products();
    }

    public function getAllProducts(int $perPage = 10): array
    {
        $products = $this->model->paginate($perPage);
        $pager   = $this->model->pager; 

        return [
            'header' => [
                'status'  => 200,
                'message' => 'Data retrieved successfully!',
            ],
            'response' => [
                'data'         => $products,
                'pagination'   => [
                    'current_page' => $pager->getCurrentPage(),
                    'per_page'     => $perPage,
                    'total_pages'  => $pager->getPageCount(),
                    'total_items'  => $pager->getTotal(),
                    'next_page'    => $pager->getNextPageURI(),
                    'prev_page'    => $pager->getPreviousPageURI(),
                ]
            ],
        ];
    }

    public function saveProducts(mixed $request): array 
    {
        if (!$this->model->insert($request)) {
            return [
                'header' => [
                    'status'  => 400,
                    'message' => 'Validation failed!',
                ],
                'errors' => $this->model->errors(),
            ];
        }

        return [
            'header' => [
                'status'  => 200,
                'message' => 'Product saved successfully!',
            ],
            'response' => $request,
        ];
    }

    public function showProducts(int $id): array
    {

        $product = $this->model->find($id);

        if (!$product) { 
            return [
                'header' => [
                    'status'  => 404,
                    'message' => 'Product not found!',
                ],
                'response' => [],
            ];
        }
        
        return [
            'header' => [
                'status'  => 200,
                'message' => 'Data retrieved successfully!',
            ],
            'response' => $product,
        ];
    }

    public function updateProducts(int $id, mixed $request): array
    {   
        if (!$this->model->find($id)) {
            return [
                'header' => [
                    'status'  => 404,
                    'message' => 'Product not found!',
                ],
                'response' => [],
            ];
        }

        if (!$this->model->update($id, $request)) {
            return [
                'header' => [
                    'status'  => 400,
                    'message' => 'Validation failed!',
                ],
                'errors' => $this->model->errors(),
            ];
        }

        return [
            'header' => [
                'status'  => 200,
                'message' => 'Product updated successfully!',
            ],
            'response' => $request,
        ];
    }

    public function deleteProducts(int $id): array
    {
        if (!$this->model->find($id)) {
            return [
                'header' => [
                    'status'  => 404,
                    'message' => 'Product not found!',
                ],
                'response' => [],
            ];
        }

        $this->model->delete($id);

        return [
            'header' => [
                'status'  => 200,
                'message' => 'Product deleted successfully!',
            ],
            'response' => $id,
        ];
    }

}