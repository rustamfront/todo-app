<?php
namespace App\Http\Controllers;

class MainController
{
    public function index()
    {
        view('main', ['aaa' => 'aaa']);
    }
}