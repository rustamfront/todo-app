<?php
use App\Kernel\Route;

Route::get('/', 'MainController@index');
Route::get('/register', 'AuthController@register');