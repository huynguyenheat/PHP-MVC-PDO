<?php

namespace App;

class App{
    protected static $registry = [];
    public static function bind($key, $value){
        static::$registry[$key] = $value;
    }

    public static function get($key){
        //dd($key);
        return static::$registry[$key];
    }
}
?>