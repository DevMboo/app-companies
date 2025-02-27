<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Services\OrdersServices;

use CodeIgniter\HTTP\ResponseInterface;

class OrdersController extends BaseController
{

    protected OrdersServices $service;

    public function __construct() {
        $this->service = new OrdersServices();
    }

    public function index(): ResponseInterface
    {
        $perPage = $this->request->getGet('per_page') ?? 10;
        $data = $this->service->getAllOrders((int) $perPage);

        return $this->response->setStatusCode($data['header']['status'])->setJSON($data);
    }

    public function show(int $id = null): ResponseInterface
    {
        $data = $this->service->showOrders($id);

        return $this->response->setStatusCode($data['header']['status'])->setJSON($data);
    }


    public function create(): ResponseInterface
    {
        $request = $this->request->getJSON(true);
        $data = $this->service->saveOrders($request);

        return $this->response->setStatusCode($data['header']['status'])->setJSON($data);
    }

    public function update(int $id = null): ResponseInterface
    {
        $request = $this->request->getJSON(true);
        $data = $this->service->updateOrders($id, $request);

        return $this->response->setStatusCode($data['header']['status'])->setJSON($data);
    }

    public function delete(int $id = null): ResponseInterface
    {
        $data = $this->service->deleteOrders($id);

        return $this->response->setStatusCode($data['header']['status'])->setJSON($data);
    }
}
