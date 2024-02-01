<?php
namespace App\Controllers;

use App\Models\Users;
use App\Request;
use App\View;

class UserController
{

    public function editUserNamePage()
    {
        $id = $_SESSION['userInfo']['id'];
        $users = new Users();
        $result = $users->where('id', $id)->get();
        if ($result) {
            View::render('editUserNamePage', 'constantPage', ['result' => $result]);
        } else {
            View::render("errorPage", "constantPage", ['message' => 'ویرایش پروفایل دچار خطا شده لطفا بعدا تلاش بفرمایید.']);
        }
    }

    public function editUserNamePost()
    {
        $data = Request::postData();

        $oldPassword = $data['user_password_old'];
        unset($data['user_password_old']);

        $data["user_password"] = password_hash($data["user_password"],PASSWORD_DEFAULT);
        $id = $_SESSION['userInfo']['id'];

        $users = new Users();
        $resultSelect = $users->where('id', $id)->get();

        if ($resultSelect && password_verify($oldPassword, $resultSelect[0]['user_password'])) {
            $result = $users->where('id',$id)->update($data);
            if($result){
                // session_destroy();
                session_regenerate_id();
                $resultSelect2 = $users->where('id', $id)->get();
                $_SESSION['userInfo'] = $resultSelect2[0];
                \redirect('/');
            }else{
                View::render("errorPage", "constantPage", ['message' => 'پروفایل شما ویرایش نشد لطفا مجددا تلاش کنید.']);
            }

        }else{
            View::render("errorPage", "constantPage", ['message' => 'برای ویرایش پسورد جدید باید پسورد قبل را درست وارد کنید.']);
        }
    }

}

?>