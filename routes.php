<?php
// $router->define([
//     'crudpdo' => "controllers/index.php",
//     'crudpdo/posts' =>"controllers/posts.php",
//     'crudpdo/test' =>"controllers/test.php"
// ]);
// $router->get('crudpdo', "controllers/index.php");
// $router->post('crudpdo/test', "controllers/test.php");

$router->get('crudpdo', 'DashboardController@index');
// $router->get('crudpdo/posts','DashboardController@allPosts');
$router->get('crudpdo/posts/create','DashboardController@create');
// $router->get('crudpdo/posts/view','DashboardController@show');
// $router->get('crudpdo/posts/edit','DashboardController@edit');
$router->post('crudpdo/posts/delete','DashboardController@delete');

$router->get('crudpdo/posts','PostsController@index');
$router->post('crudpdo/posts/store','PostsController@store');
$router->get('crudpdo/posts/view','PostsController@show');
$router->post('crudpdo/posts/delete','PostsController@destroy');
$router->get('crudpdo/posts/edit','PostsController@edit');
$router->post('crudpdo/posts/update','PostsController@update');

?>