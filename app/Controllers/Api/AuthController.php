<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Helpers\JwtHelper;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function login(): ResponseInterface
    {
        $request = $this->request->getJSON(true);

        if ($request['email'] === 'admin@email.com' && $request['password'] === '123456') {
            $userData = ['id' => 1, 'name' => 'Admin', 'email' => 'admin@email.com'];
            $token = JwtHelper::generateToken($userData);

            return $this->response->setJSON(['token' => $token])->setStatusCode(200);
        }

        return $this->response->setJSON(['error' => 'Invalid credentials'])->setStatusCode(401);
    }
}
