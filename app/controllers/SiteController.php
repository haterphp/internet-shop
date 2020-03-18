<?php

namespace app\controllers;

use vendor\controllers\Controller;

class SiteController extends Controller
{

    public function index()
    {
        $this->view('welcome', [
            'message' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, alias, aut consequuntur culpa cum cupiditate, dolorum explicabo illum in libero optio perferendis placeat quaerat quos sapiente suscipit temporibus veritatis vero!'
        ]);
    }

    public function store()
    {
        echo 'register';
    }
}

?>