<?php
namespace App\Http\Controllers;

class AuthController
{
    public function register(): void
    {
        echo view('auth/register');
    }
}