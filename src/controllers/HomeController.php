<?php
namespace Src\Controllers;

class HomeController 
{
    public function index()
    {
        return Controller::view('home');
    }

    public function profile()
    {
        return Controller::view('profile');
    }
}