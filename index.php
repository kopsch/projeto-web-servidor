<?php

require __DIR__ . "/config/bootstrap.php";
require PROJECT_ROOT_PATH . "/controllers/UserController.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

if ((isset($uri[2]) && $uri[2] != 'user') || !isset($uri[3])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$objFeedController = new UserController();
$strMethodName = $uri[3] . 'Action';

error_log($strMethodName);
$objFeedController->{$strMethodName}();

?>