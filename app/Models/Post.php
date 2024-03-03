<?php
namespace App\Models;
use PDO;
class Post{
    public function storePost($imgUrl, $data){
        // dd(implode(', ', array_keys($data)));
        $data['thumbnail']=$imgUrl;
        $query = sprintf("INSERT INTO %s (%s) VALUES(%s)", "posts",implode(', ', array_keys($data)),":" . implode(', :', array_keys($data)));
        //dd($data);
        try {
            $stm = connect()->prepare($query);
            $stm->execute($data);

            ob_start();
            session_start();
            setSession('success','Post add successfully');
            header("Location: /crudpdo/posts/create");

        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    public function allPost($table){
        $query = "SELECT * FROM {$table}";
        try {
            $stm = connect()->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);

        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    public function showPost($table, $id){
        $select = "SELECT * FROM {$table} WHERE id=?";
        $stm = connect()->prepare($select);
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_OBJ);
    }

    public function deletePost($table, $id){
        $query = "DELETE FROM {$table} WHERE id=?";
        $stm = connect()->prepare($query);
        $stm->execute([$id]);
    }

    public function updatePost($imgUrl, $data){
        $data['thumbnail']=$imgUrl;
        //dd($data);
        $query = "UPDATE posts SET title=?, slug=?, body=?, thumbnail=?, isPublished=?, created_at=? WHERE id=?";
        try {
            $stm = connect()->prepare($query);
            $stm->execute([$data['title'], $data['slug'], $data['body'], $data['thumbnail'], $data['isPublished'], $data['created_at'], $data['id']]);
            header("Location: /crudpdo/posts");

        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}