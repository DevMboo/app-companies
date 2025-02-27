<?php

namespace App\Services;

use App\Models\Clients;

class ClientsServices {

    protected Clients $model;

    public function __construct() {
        $this->model = new Clients();
    }

    public function getAllClients(int $perPage = 10): array
    {
        $clients = $this->model->paginate($perPage);
        $pager   = $this->model->pager; 

        return [
            'header' => [
                'status'  => 200,
                'message' => 'Data retrieved successfully!',
            ],
            'response' => [
                'data'         => $clients,
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

    public function saveClients(mixed $request): array 
    {
        $this->model->save($request);

        return [
            'header' => [
                'status'  => 200,
                'message' => 'Client saved successfully!',
            ],
            'response' => $request,
        ];
    }

    public function showClients(int $id): array
    {

        $client = $this->model->find($id);

        if (!$client) { 
            return [
                'header' => [
                    'status'  => 404,
                    'message' => 'Client not found!',
                ],
                'response' => [],
            ];
        }
        
        return [
            'header' => [
                'status'  => 200,
                'message' => 'Data retrieved successfully!',
            ],
            'response' => $client,
        ];
    }

    public function updateClients(int $id, mixed $request): array
    {   
        if (!$this->model->find($id)) {
            return [
                'header' => [
                    'status'  => 404,
                    'message' => 'Client not found!',
                ],
                'response' => [],
            ];
        }
        
        $this->model->update($id, $request);

        return [
            'header' => [
                'status'  => 200,
                'message' => 'Client updated successfully!',
            ],
            'response' => $request,
        ];
    }

    public function deleteClients(int $id): array
    {
        if (!$this->model->find($id)) {
            return [
                'header' => [
                    'status'  => 404,
                    'message' => 'Client not found!',
                ],
                'response' => [],
            ];
        }

        $this->model->delete($id);

        return [
            'header' => [
                'status'  => 200,
                'message' => 'Client deleted successfully!',
            ],
            'response' => $id,
        ];
    }
}