<?php
namespace vendor\views;

class View{
    public function __construct($path, $data, $title)
    {
        include $_SERVER['DOCUMENT_ROOT'].'/views/'.$path.'.php';
    }
}

?>