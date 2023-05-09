<?php

namespace Src\Controllers;

class UserController
{
    private $requestMethod;
    private $uriMethod;

    public function __construct($requestMethod, $uriMethod) {
        $this->requestMethod = $requestMethod;
        $this->uriMethod = $uriMethod;
    }

    public function processRequest()
    {
        switch ($this->requestMethod) {
            case 'value':
                # code...
                break;
            
            default:
                # code...
                break;
        }
    }
}
