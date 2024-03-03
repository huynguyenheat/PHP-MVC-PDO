<?php
namespace App\Controllers;
use App\Request;
use App\Models\Post;
class PostsController{
    public function store(){
        // dd(Request::file());
        $img = Request::file()['thumbnail'];
        $filepath = $img['tmp_name'];
        $imgName = strtolower(str_replace(' ', '-', $img['name']));
        $imgUrl = 'public/assets/thumbnails/' . $imgName;
        move_uploaded_file($filepath, $imgUrl);
        (new Post)->storePost($imgUrl, Request::values());
        // dd('success');
    }

    public function index(){
        $posts = (new Post) -> allPost('posts');
        //dd($posts);
        return view("posts", ['posts'=>$posts]);
        //echo 'dashboard';
    }

    public function show(){
        //dd(Request::values()['id']);
        $post = (new Post)->showPost('posts', $_REQUEST['id']);
        return view("show", ['post'=>$post]);
    }

    public function destroy(){
        (new Post)->deletePost('posts', $_REQUEST['id']);
        // return view("show", ['post'=>$post]);
        redirect('/crudpdo/posts');
    }

    public function edit(){
        $post = (new Post)->showPost('posts', $_REQUEST['id']);
        return view("edit", ['post'=>$post]);
    }

    public function update(){
        $img = Request::file()['thumbnail'];
        $filepath = $img['tmp_name'];
        $imgName = strtolower(str_replace(' ', '-', $img['name']));
        $imgUrl = 'public/assets/thumbnails/' . $imgName;
        move_uploaded_file($filepath, $imgUrl);
        (new Post)->updatePost($imgUrl, Request::values());
    }
}