<?php

namespace App;

use Exception;

    class Router{
        protected $routes = [
            'GET'=>[],
            'POST'=>[],
        ];

        // public function define($routes){
        //     $this->routes = $routes;
        // }

        public function get($uri, $controller){
            $this->routes['GET'][$uri] = $controller;
        }


        public function post($uri, $controller){
            $this->routes['POST'][$uri] = $controller;
        }

        public static function load($file){
            $router = new static;
            require $file;
            return $router;
        }

        public function show($uri, $method){

            // var_dump($this->routes);

            //dd(...explode('@', $this->routes[$method][$uri]));

            //explode('@', $this->routes[$method][$uri]);

            if (array_key_exists($uri, $this->routes[$method])) {
                return $this->callMethod(...explode('@', $this->routes[$method][$uri]));
                //return $this->routes[$method][$uri];
            }
            throw new Exception('Route not found');
        }

        public function callMethod($controller, $action){
            $link = "App\\Controllers\\{$controller}";

            $cont = new $link;
            return $cont->$action();
            dd($action); 
        }
    }
?>