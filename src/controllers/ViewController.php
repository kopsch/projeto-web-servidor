<?php
namespace Src\Controllers;

class ViewController 
{
    public function index()
    {
        require __DIR__ . '/../views/home/home.php';
    }

    public function cart()
    {
        require __DIR__ . '/../views/cart/cart.php';
    }

    public function login()
    {
        require __DIR__ . '/../views/login/login.php';
    }

    public function register()
    {
        require __DIR__ . '/../views/register/register.php';
    }

    public function product()
    {
        require __DIR__ . '/../views/product/product.php';
    }

    public function payment()
    {
        require __DIR__ . '/../views/payment/payment.php';
    }
}