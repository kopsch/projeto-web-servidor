<?php

namespace Src\Http\Middlewares;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\HttpException;
use Src\Models\User;

class JWTAuth implements IMiddleware
{
    public function handle(Request $request): void
    {
        $headers = $request->getHeaders();

        $jwt = isset($headers['http_authorization']) ? str_replace('Bearer ', '', $headers['http_authorization']) : '';

        if (!$jwt) {
            throw new HttpException('Usuário não está logado', 403);
        }

        $decoded = JWT::decode($jwt, new Key($_ENV['JWT_KEY'], 'HS256'));

        $username = $decoded->username ?? '';

        $user = User::getByUsername($username);

        if (!$user) {
            throw new HttpException('Usuário não está logado', 403);
        }
    }
}