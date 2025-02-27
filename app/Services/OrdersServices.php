<?php

namespace App\Services;

use App\Models\Orders;
use App\Models\Products;

class OrdersServices {

    protected Orders $model;
    protected Products $productModel;

    public function __construct() {
        $this->model = new Orders();
        $this->productModel = new Products();
    }

    public function getAllOrders(int $perPage = 10): array
    {
        $orders = $this->model->paginate($perPage);
        $pager   = $this->model->pager; 

        return [
            'header' => [
                'status'  => 200,
                'message' => 'Data retrieved successfully!',
            ],
            'response' => [
                'data'         => $orders,
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

    public function saveOrders(mixed $request): array 
    {
        $product = $this->productModel->find($request['product_id']);

        if (!$product) {
            return [
                'header' => [
                    'status'  => 404,
                    'message' => 'Product not found!',
                ],
                'errors' => [],
            ];
        }

        if ($product['quantity'] < $request['quantity']) { 
            return [
                'header' => [
                    'status'  => 400,
                    'message' => 'The product is out of stock!',
                ],
                'errors' => ['quantity' => 'The selected product is not available in stock.'],
            ];
        }

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
                'message' => 'Order saved successfully!',
            ],
            'response' => $request,
        ];
    }

    public function showOrders(int $id): array
    {

        $order = $this->model->find($id);

        if (!$order) { 
            return [
                'header' => [
                    'status'  => 404,
                    'message' => 'Order not found!',
                ],
                'response' => [],
            ];
        }
        
        return [
            'header' => [
                'status'  => 200,
                'message' => 'Data retrieved successfully!',
            ],
            'response' => $order,
        ];
    }

    public function updateOrders(int $id, mixed $request): array
    {   
        if (!$this->model->find($id)) {
            return [
                'header' => [
                    'status'  => 404,
                    'message' => 'Order not found!',
                ],
                'response' => [],
            ];
        }
        
        $this->model->update($id, $request);

        return [
            'header' => [
                'status'  => 200,
                'message' => 'Order updated successfully!',
            ],
            'response' => $request,
        ];
    }

    public function deleteOrders(int $id): array
    {
        if (!$this->model->find($id)) {
            return [
                'header' => [
                    'status'  => 404,
                    'message' => 'Order not found!',
                ],
                'response' => [],
            ];
        }

        $this->model->delete($id);

        return [
            'header' => [
                'status'  => 200,
                'message' => 'Order deleted successfully!',
            ],
            'response' => $id,
        ];
    }
}
