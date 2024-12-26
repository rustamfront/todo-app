<?php
require __DIR__. '/vendor/autoload.php';
require __DIR__. '/app/helpers.php';
require __DIR__. '/routes/web.php';

$dbconn = pg_connect("host=localhost port=5432 user=todo_db password=example");


\App\Kernel\Route::run($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);


