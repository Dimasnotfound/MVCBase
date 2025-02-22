<?php

class App {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->parseUrl();
        if (isset($url[0]) && file_exists('../app/controllers/' . ucfirst($url[0]) . 'Controller.php')) {
            $this->controller = ucfirst($url[0]) . 'Controller';
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl(){
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = explode('/', trim($uri, '/'));

        if(isset($url[0]) && $url[0] == basename($_SERVER['SCRIPT_NAME'])){
            array_shift($url);
        }
        return $url;
    }
}
