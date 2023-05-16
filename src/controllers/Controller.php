<?php
namespace Src\Controllers;

use Exception;
use League\Plates\Engine;
class Controller
{
    public static function view(string $view, array $data = [])
    {
        $viewsPath = dirname(__FILE__, 2) . '/views';

        if (!file_exists($viewsPath . DIRECTORY_SEPARATOR . $view . '.php')) {
            throw new Exception("A view {$view} não existe");
        }

        $templates = new Engine($viewsPath);

        return $templates->render($view, $data);
    }
}