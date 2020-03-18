<?php
    use \app\providers\RouteProvider;
    use vendor\route\Route;

    RouteProvider::boot();

    require_once 'routes/web.php';
    require_once 'routes/api.php';

    Route::open();

?>