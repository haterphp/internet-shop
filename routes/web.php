<?php
    use vendor\route\Route;

    Route::get('/', 'SiteController@index');
    Route::post('/register', 'UserController@store');

?>