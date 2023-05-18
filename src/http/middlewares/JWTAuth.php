<?php

namespace Src\Http\Middlewares;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class JWTAuth implements IMiddleware
{
    public function handle(Request $request): void
    {
        try {
            $headers = $request->getHeaders();

            if (isset($headers['http_authorization'])) {
                $jwt = str_replace('Bearer ', '', $headers['http_authorization']);
            } else if ($_COOKIE['project_token']) {
                $jwt = $_COOKIE['project_token'];
            } else {
                $jwt = '';
            }
        
            JWT::decode($jwt, new Key($_ENV['JWT_KEY'], 'HS256'));

        } catch (Exception $e) {
            header('Location: /login');
            exit();
        }
    }
}