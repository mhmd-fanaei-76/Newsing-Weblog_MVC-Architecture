<?php
namespace App\Controllers;

use App\Models\News;
use App\Models\Users;
use App\Request;
use App\View;

class AuthController
{
    public function registerPageView()
    {
        if(!empty($_SESSION['userInfo'])){
            redirect('/');
        }
        View::render("registerPage", "constantPage");
    }

    public function registerPostPageView()
    {
        $data = Request::postData();
        $data["user_password"] = password_hash($data["user_password"],PASSWORD_DEFAULT);
        // \myVardump($data); exit;
        $users = new Users();
        $result = $users->create($data);
        if ($result) {
            $_SESSION["userInfo"] = $data;
            \redirect("/");
        } else {
            View::render("errorPage", "constantPage", ['message' => 'عضویت شما با خطا مواجه شده است لطفا برای عضویت مجددا تلاش بفرمایید.']);
        }

    }

    public function loginPageView()
    {
        if(!empty($_SESSION['userInfo'])){
            redirect('/');
        }
        View::render("loginPage", "constantPage");
    }
    public function loginPostPageView()
    {
        $data = Request::postData();
        $user_name = $data['user_name'];
        $user_password = $data['user_password'];

        $users = new Users();
        $result = $users->where('user_name', $user_name)->get();
        if ($result && password_verify($user_password,$result[0]['user_password'])) {
            
            // setcookie("login_weblog",
            // json_encode(['user_name'=>$user_name , 'user_password'=> $user_password]),
            //  time() + 3600);
            $_SESSION['userInfo'] = $result[0];
            \redirect('/');
        } else {
            View::render("errorPage", "constantPage", ['message' => 'ورود شما با خطا مواجه شده است لطفا برای ورود مجددا تلاش بفرمایید.']);
        }
    }

    public function logOut()
    {
        session_destroy();
        session_regenerate_id();
        \redirect("/login");
    }


}