<?php
use App\App;
use App\Controllers\AuthController;
use App\Controllers\HomeContentController;
use App\Controllers\MyController;
use App\Controllers\UserController;

session_start();
require_once dirname(__DIR__) . "/vendor/autoload.php";
$basePath = dirname(__DIR__);
$app = new App($basePath);

$app->router->get('/', [HomeContentController::class, 'homeContentPageView']);
$app->router->get('/register', [AuthController::class, 'registerPageView']);
$app->router->post('/register', [AuthController::class, 'registerPostPageView']);
$app->router->get('/login', [AuthController::class, 'loginPageView']);
$app->router->post('/login', [AuthController::class, 'loginPostPageView']);
$app->router->get('/logout', [AuthController::class, 'logOut']);
$app->router->get('/continue_news', [HomeContentController::class, 'continue_news']);

$app->router->get('/aboutUs', [MyController::class, 'aboutUs']);

$app->router->get('/myNews', [HomeContentController::class, 'myNews']);

$app->router->get('/addMyNews', [HomeContentController::class, 'addMyNewsPage']);
$app->router->post('/addMyNews', [HomeContentController::class, 'addMyNewsPost']);

$app->router->get('/editMyNews', [HomeContentController::class, 'editMyNewsPage']);
$app->router->post('/editMyNews', [HomeContentController::class, 'editMyNewsPost']);

$app->router->get('/deleteMyNews', [HomeContentController::class, 'deleteMyNews']);

$app->router->get('/editMyUserName', [UserController::class, 'editUserNamePage']);
$app->router->post('/editMyUserName', [UserController::class, 'editUserNamePost']);

$app->router->get('/siasyNews',[HomeContentController::class,'siasyNews']);
$app->router->get('/varzeshiNews',[HomeContentController::class,'varzeshiNews']);
$app->router->get('/ejtemaeiNews',[HomeContentController::class,'ejtemaeiNews']);

$app->router->get('/like',[HomeContentController::class,'likeNews']);
$app->router->get('/dis_like',[HomeContentController::class,'disLikeNews']);

$app->router->get('/comment',[HomeContentController::class,'showComment']);

$app->router->post('/addcomment',[HomeContentController::class,'addComment']);






$app->run();






?>