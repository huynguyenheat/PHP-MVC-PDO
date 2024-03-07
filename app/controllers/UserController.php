<?php
namespace App\Controllers;
use App\Request;
use App\Models\User;

class UserController {
    public function registerpage(){
        return view("register");
    }

    public function loginpage(){
        return view("login");
    }

    public function register() {
        if (Request::method() == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Băm mật khẩu trước khi lưu vào cơ sở dữ liệu
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Tạo người dùng mới
            $user = new User();
            $user->setEmail($email);
            $user->setPassword($hashedPassword);

            if ($user->save()) {
                redirect('/crudpdo/login');
            } else {
                echo "Register fail";
            }
        }
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Tìm người dùng trong cơ sở dữ liệu
            $user = User::findByEmail($email);

            if ($user && password_verify($password, $user->getPassword())) {
                // Đăng nhập thành công, lưu session và chuyển hướng 
                session_start();
                $_SESSION['user_id'] = $user->getId();
                redirect('/crudpdo');
            } else {
                redirect('/crudpdo/login');
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        redirect('/crudpdo/login');
        exit();
    }
}
?>