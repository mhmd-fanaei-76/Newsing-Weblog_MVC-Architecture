<?php
namespace App\Controllers;

use App\View;

class MyController
{
    public function aboutUs()
    {
        echo View::loadView("aboutUs");
    }
}