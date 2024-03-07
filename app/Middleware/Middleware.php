<?php
namespace App\Middleware;

class Middleware{
    public static function authenticate(){
        session_start();
        if(!isset($_SESSION['user_id'])){
            return view("login");
        }
    }
}