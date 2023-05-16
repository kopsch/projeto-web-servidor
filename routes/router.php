<?php
use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter as Router;
use Src\Controllers\HomeController;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;

Router::error(function(Request $request, Exception $exception) {
    if ($exception instanceof NotFoundHttpException) {
        header('Location: /');
        exit;
    }

    echo 'Erro: ' . $exception->getMessage();
});


Router::get('/', [HomeController::class, 'index']);

Router::start();