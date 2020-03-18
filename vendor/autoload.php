<?php
    spl_autoload_register(function ($className){
        $class_peaces = explode('\\', $className);
        switch ($class_peaces[0]){
            case "app":
                require "{$_SERVER['DOCUMENT_ROOT']}/" . implode(DIRECTORY_SEPARATOR, $class_peaces) . ".php";
                break;
            case "vendor":
                require "{$_SERVER['DOCUMENT_ROOT']}/" . implode(DIRECTORY_SEPARATOR, $class_peaces) . ".php";
                break;
        }
    }, true, true);
?>