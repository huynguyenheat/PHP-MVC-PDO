<?php
// $config = require "config.php";
use App\{ Router, Request};


// App::get('config');
// require "database/Connection.php";
// require "database/migrations/CreateUsersTable.php";
// require "database/migrations/CreatePostsTable.php";

// App::bind('config', require "config.php");

// $pdo = Connection::make(App::get('config')['database']);

CreateUsersTable::usersTable(connect());
CreatePostsTable::postsTable(connect());

//var_dump(trim($_SERVER['REQUEST_URI'], '/'));
// $uri = trim($_SERVER['REQUEST_URI'], '/');

// //Lay request uri tu server
// $uri = Request::uri();
// //Tao instance cua router de su dung cac method xu ly route da viet
// $router = new Router;
// //Goi array chua list route da quy dinh
// require "routes.php";
// //Ham show se check uri neu khop voi 1 trong cac url cua array route da khai bao thi return string cho require, de goi den controller va tra ve view
// require $router->show($uri);

//REFACTORING CODE
Router::load("routes.php")->show(Request::uri(), Request::method());
//dd($_SERVER['REQUEST_URI']);



?>