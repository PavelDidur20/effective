<?php
namespace App\Core;

class Router
{
    public static function handle()
    {
        $routes = require __DIR__ . '/../../routes/web.php';
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = trim($path, "/");

        if (isset($routes[$uri])) {
            $action = $routes[$uri];
            $action();
        } else {
            http_response_code(404);
            echo "404 not found";
        }
    }

}
