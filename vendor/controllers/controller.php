<?php

namespace vendor\controllers;

use vendor\views\View;

class Controller{
    protected function view($view, $data = []){
        $this->v = new View($view, $data, 'default');
    }
}

?>