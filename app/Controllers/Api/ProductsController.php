<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Services\ProductsServices;
use CodeIgniter\HTTP\ResponseInterface;

class ProductsController extends BaseController
{
    protected ProductsServices $service;

    public function __construct() {
        $this->service = new ProductsServices();
    }

    public function index(): ResponseInterface
    {
        $perPage = $this->request->getGet('per_page') ?? 10;
        $data = $this->service->getAllProducts((int) $perPage);

        return $this->response->setStatusCode($data['header']['status'])->setJSON($data);
    }

    public function show(int $id = null): ResponseInterface
    {
        $data = $this->service->showProducts($id);

        return $this->response->setStatusCode($data['header']['status'])->setJSON($data);
    }


    public function create(): ResponseInterface
    {
        $request = $this->request->getJSON(true);
        $data = $this->service->saveProducts($request);

        return $this->response->setStatusCode($data['header']['status'])->setJSON($data);
    }

    public function update(int $id = null): ResponseInterface
    {
        $request = $this->request->getJSON(true);
        $data = $this->service->updateProducts($id, $request);

        return $this->response->setStatusCode($data['header']['status'])->setJSON($data);
    }

    public function delete(int $id = null): ResponseInterface
    {
        $data = $this->service->deleteProducts($id);

        return $this->response->setStatusCode($data['header']['status'])->setJSON($data);
    }
}
