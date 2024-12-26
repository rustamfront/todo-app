<?php


    function view(string $view, array $data = [])
    {
        extract($data, EXTR_SKIP);
        ob_start();
        include 'public/views/' . $view . '.php';
        return ob_get_clean();
    }