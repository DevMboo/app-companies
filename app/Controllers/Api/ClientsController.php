<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Services\ClientsServices;

use CodeIgniter\HTTP\ResponseInterface;

class ClientsController extends BaseController
{

    protected ClientsServices $service;

    public function __construct() {
        $this->service = new ClientsServices();
    }

    public function index(): ResponseInterface
    {
        $perPage = $this->request->getGet('per_page') ?? 10;
        $data = $this->service->getAllClients((int) $perPage);
        
        return $this->response->setStatusCode($data['header']['status'])->setJSON($data);
    }

    public function show(int $id = null): ResponseInterface
    {
        $data = $this->service->showClients($id);

        return $this->response->setStatusCode($data['header']['status'])->setJSON($data);
    }

    public function create(): ResponseInterface
    {
        $request = $this->request->getJSON(true);
        $data = $this->service->saveClients($request);

        return $this->response->setStatusCode($data['header']['status'])->setJSON($data);
    }

    public function update(int $id = null): ResponseInterface
    {
        $request = $this->request->getJSON(true);
        $data = $this->service->updateClients($id, $request);

        return $this->response->setStatusCode($data['header']['status'])->setJSON($data);
    }

    public function delete(int $id = null): ResponseInterface
    {
        $data = $this->service->deleteClients($id);

        return $this->response->setStatusCode($data['header']['status'])->setJSON($data);
    }
}
