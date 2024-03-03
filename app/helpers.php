<?php

use App\App;
use Database\Connection;

if(!function_exists('dd')){
    function dd($data){
        echo '<pre>';
        die(var_dump($data));
        echo '</pre>';
    }
}

if(!function_exists('connect')){
    function connect(){
        App::bind('config', require "config.php");
        return Connection::make(App::get('config')['database']);
    }
}

if(!function_exists('view')){
    function view($view, $data=null){
        if($data != null){
            extract($data);
        }
        require "views/{$view}.view.php";
    }
}

if(!function_exists('setSession')){
    function setSession($key, $text){
        $_SESSION[$key] = $text;
        //dd($_SESSION[$key]);
    }
}

if(!function_exists('redirect')){
    function redirect($route){
        header("Location: {$route}");
    }
}