<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Helpers\JwtHelper;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $authHeader = $request->getHeaderLine('Authorization');

        if (!$authHeader) {
            return response()->setJSON(['error' => 'Token not found'])->setStatusCode(401);
        }

        $token = str_replace('Bearer ', '', $authHeader);
        $decoded = JwtHelper::validateToken($token);

        if (!$decoded) {
            return response()->setJSON(['error' => 'Token invalid or expired'])->setStatusCode(401);
        }

        $request->user = $decoded->data;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) { }
}
