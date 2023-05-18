<?php
use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter as Router;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Src\Controllers\UserController;
use Src\Controllers\ViewController;
use Src\Http\Middlewares\JWTAuth;

Router::error(function(Request $request, Exception $exception) {
    if ($exception instanceof NotFoundHttpException) {
        header('Location: /');
        exit;
    }

    echo 'Erro: ' . $exception->getMessage();
});

// ROTAS DE VIEW
Router::get('/', [ViewController::class, 'index']);
Router::get('/login', [ViewController::class, 'login']);
Router::get('/register', [ViewController::class, 'register']);

Router::group(['middleware' => JWTAuth::class], function() {
    Router::get('/cart', [ViewController::class, 'cart']);
    Router::get('/payment', [ViewController::class, 'payment']);
    Router::get('/payment-finalized', [ViewController::class, 'finalizedPayment']);
    Router::get('/user/edit', [ViewController::class, 'edit']);
});


// ROTAS DE API
Router::group(['prefix' => '/api', 'middleware' => JWTAuth::class], function() {
    Router::get('/users/me', [UserController::class, 'getAuthenticatedUser']);
    Router::get('/logout', [UserController::class, 'logout']);
    Router::get('/user/edit', [UserController::class, 'edit']);
});

Router::group(['prefix' => '/api'], function () {
    Router::post('/register', [UserController::class, 'store']);
    Router::post('/auth', [UserController::class, 'authenticate']);
});

Router::group(['prefix' => '/guitars'], function () {
    Router::get('/guitar1', [ViewController::class, 'guitar1']);
    Router::get('/guitar2', [ViewController::class, 'guitar2']);
    Router::get('/guitar3', [ViewController::class, 'guitar3']);
    Router::get('/guitar4', [ViewController::class, 'guitar4']);
    Router::get('/guitar5', [ViewController::class, 'guitar5']);
    Router::get('/guitar6', [ViewController::class, 'guitar6']);

});

Router::start();