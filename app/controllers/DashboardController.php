<?php

namespace App\Controllers;

    class DashboardController{
        public function index(){
            return view("index");
            //echo 'dashboard';
        }
        public function allPosts(){
            return view("posts");
        }
        public function create(){
            return view("create");
        }
        public function show(){
            return view("show");
        }
        public function edit(){
            return view("edit");
        }
        public function delete(){
            echo "delete";
        }
    }
?>