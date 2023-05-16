<?php
namespace Src\Controllers;

class HomeController 
{
    public function index()
    {
        return Controller::view('home');
    }
}