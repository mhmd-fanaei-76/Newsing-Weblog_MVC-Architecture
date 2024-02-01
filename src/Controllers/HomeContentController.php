<?php
namespace App\Controllers;

use App\Models\Comments;
use App\Models\Likes;
use App\Models\News;
use App\Request;
use App\View;
use LDAP\Result;

class HomeContentController
{
    public function homeContentPageView()
    {
        $news = new News();
        $result = $news->get();
        // foreach ($result as $value) {
        //    $title = $value['title'];
        //    $pic_news = $value['pic_news'];
        //    $full_news = $value['full_news'];
        //    $time_news = $value['time_news'];
        //    echo "$title<br>$pic_news<br>$full_news<br>$time_news<hr>";
        // }
        if($result){
            View::render("homeContentPage", "constantPage", ['result' => $result, 'continue' => ['false']]);
        }else{
            View::render("homeContentPage", "constantPage", ['continue' => ['nothingAllNews']]);
        }
    }

    public function continue_news()
    {
        $id = Request::getData()['id'];
        $idnews = $_SESSION["newsInfo"]=$id; // Felan Bedon Estefadeh
        $news = new News();
        $result = $news->where("id", "$id")->get();
        // $likes = new Likes();
        // $resultL = $likes->where('news_id',$idnews)->get(['count(*) as total_count']);
        // myVardump($resultL);
        if (!empty($_SESSION['userInfo'])) {
                View::render("homeContentPage", "constantPage", ['result' => $result, 'continue' => ['true']]);
        } else {
            View::render("errorPage", "constantPage", ['message' => 'برای دسترسی به جزئیات خبر ها باید با حساب کاربری خود وارد شوید.']);
        }
    }

    public function myNews()
    {
        $user_id = $_SESSION['userInfo']['id'];
        $news = new News();
        $result = $news->where('user_id', $user_id)->get();
        
        if ($result) {
            View::render("homeContentPage", "constantPage", ['result' => $result, 'continue' => ['myNews']]);
        } else {
            View::render("homeContentPage", "constantPage", ['continue' => ['nothingMyNews']]);
        }
    }

    public function addMyNewsPage()
    {
        View::render("addMyNewsPage", "constantPage");
    }

    public function addMyNewsPost()
    {
        $data = Request::postData();
        $time = time();
        $user_id = $_SESSION["userInfo"]["id"];

        $picName = $_FILES['pic_news']['name'];
        $picTmpPath = $_FILES['pic_news']['tmp_name'];
        $picMainPath = "Images/$picName";
        move_uploaded_file($picTmpPath, $picMainPath);

        $data['pic_news'] = $picMainPath;
        $data['time_news'] = $time;
        $data['user_id'] = $user_id;
        $news = new News();
        $result = $news->create($data);
        if ($result) {
            \redirect('/myNews');
        }else{
            View::render("errorPage", "constantPage", ['message' => 'متاسفانه درج خبر شما با خطا مواجه شده است مجددا تلاش فرمایید.']);
        }
    }

    public function editMyNewsPage(){
        $data = Request::getData();
        $id = $data['id'];
        $news = new News();
        $result = $news->where("id","$id")->get();
        //  myVardump($result);
        View::render('editMyNewsPage', 'constantPage',['result'=> $result]);
    }

    public function editMyNewsPost(){
        $data = Request::postData();
        $id = $data['id'];
        unset($data['id']);

        $picName = $_FILES['pic_news']['name'];
        $picTmpPath = $_FILES['pic_news']['tmp_name'];
        $picMainPath = "Images/$picName";
        move_uploaded_file($picTmpPath, $picMainPath);
        
        $time = time();
        $data['pic_news'] = $picMainPath;
        $data['time_news'] = $time;

        $news = new News();
        $result = $news->where('id',$id)->update($data);
        if($result){
            \redirect("/myNews");
        }else{
            View::render("errorPage", "constantPage", ['message' => 'متاسفانه خبر شما ویرایش نشده است لطفا مجددا جهت ویرایش تلاش فرمایید.']);
        }
    }

    public function deleteMyNews(){
        $data = Request::getData();
        $id = $data['id'];
        $news = new News();
        $result = $news->where('id',$id)->delete();
        if($result){
            \redirect('/myNews');
        }else{
            View::render("errorPage", "constantPage", ['message' => 'متاسفانه خبر شما خبر شما حذف نشد دوباره تلاش کنید.']);
        }
    }

    public function siasyNews(){
        $news = new News();
        $result = $news->where('category','siasy')->get();
        if($result){
            View::render("homeContentPage", "constantPage", ['result' => $result, 'continue' => ['siasy']]);
        }else{
            View::render("homeContentPage", "constantPage", ['continue' => ['nothingAllNews']]);
        }
    }

    public function varzeshiNews(){
        $news = new News();
        $result = $news->where('category','varzeshi')->get();
        if($result){
            View::render("homeContentPage", "constantPage", ['result' => $result, 'continue' => ['varzeshi']]);
        }else{
            View::render("homeContentPage", "constantPage", ['continue' => ['nothingAllNews']]);
        } 
    }

    public function ejtemaeiNews(){
        $news = new News();
        $result = $news->where('category','ejtemaei')->get();
        if($result){
            View::render("homeContentPage", "constantPage", ['result' => $result, 'continue' => ['ejtemaei']]);
        }else{
            View::render("homeContentPage", "constantPage", ['continue' => ['nothingAllNews']]);
        } 
    }

    public function likeNews(){
        $data['news_id'] = Request::getData()['id'];
        $data['user_id'] =  $_SESSION['userInfo']['id'];
        $likes = new Likes();
        $result = $likes->create($data);
        if($result){
            \redirect('/');
        }
    }

    public function disLikeNews(){
        $news_id=Request::getData()['id'];
        $user_id= $_SESSION['userInfo']['id'];
        $likes = new Likes();
        $result = $likes->where('news_id',$news_id)->where('user_id',$user_id)->delete();
        if($result){
           \redirect('/myNews');
        }
    }

    public function showComment(){
        $comments = new Comments();
        $result = $comments->get();
        $news_id = Request::getData();
        if($result){
            View::render("homeContentPage", "constantPage", ['result' => $result, 'continue' => ['comments'] , 'news_id'=>$news_id]);
        }else{
            View::render("homeContentPage", "constantPage", ['result' => $result, 'continue' => ['comments'] , 'news_id'=>$news_id]);
        }
    }

    public function addComment(){
        $data = Request::postData();
        $data['user_id'] = $_SESSION['userInfo']['id'];
        $news_id = $data['news_id'];
        $comments = new Comments();
        $result = $comments->create($data);
        if($result){
            \redirect("\comment?id=$news_id");
        }else{
            View::render("errorPage", "constantPage", ['message' => 'متاسفانه نظر شما درج نشد دوباره تلاش کنید.']);
        }
    }
 
    ////////////////////////////////////////////Bedon Karbord
    public function likeCount(){
        $likes = new Likes();
        $id = $_SESSION['newsInfo'];

        $resultL = $likes->where('news_id',$id)->get(['count(*)']);
        $_SESSION['likeCount'] = $resultL[0][0];
        //  var_dump($_SESSION['likeCount']);
    }
    //////////////////////////////////////////

}
?>