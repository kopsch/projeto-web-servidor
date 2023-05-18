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

    public function edit()
    {
        require __DIR__ . '/../views/edit/edit.php';
    }

    public function finalizedPayment()
    {
        require __DIR__ . '/../views/finalizedPayment/finalizedPayment.php';
    }

    public function guitar1()
    {
        require __DIR__ . '/../views/guitars/guitar1.php';
    }

    public function guitar2()
    {
        require __DIR__ . '/../views/guitars/guitar2.php';
    }

    public function guitar3()
    {
        require __DIR__ . '/../views/guitars/guitar3.php';
    }

    public function guitar4()
    {
        require __DIR__ . '/../views/guitars/guitar4.php';
    }

    public function guitar5()
    {
        require __DIR__ . '/../views/guitars/guitar5.php';
    }

    public function guitar6()
    {
        require __DIR__ . '/../views/guitars/guitar6.php';
    }
}