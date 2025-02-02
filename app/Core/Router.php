<?php

namespace App\Core;

class Router
{
    private $routes = [];

    public function get($uri, $callback)
    {
        $this->addRoute('GET', $uri, $callback);
    }

    public function post($uri, $callback)
    {
        $this->addRoute('POST', $uri, $callback);
    }

    private function addRoute($method, $uri, $callback)
    {
        $this->routes[$method][$uri] = $callback;
    }

    public function dispatch($uri, $method)
    {
        $uri = parse_url($uri, PHP_URL_PATH);

        if (isset($this->routes[$method][$uri])) {
            $callback = $this->routes[$method][$uri];

            if (is_callable($callback)) {
                echo call_user_func($callback);
                return;
            }

            if (is_array($callback)) {
                $controller = new $callback[0]();
                $method = $callback[1];
                echo $controller->$method();
                return;
            }
        }

        http_response_code(404);
        echo "404 - Page Not Found";
    }
}
