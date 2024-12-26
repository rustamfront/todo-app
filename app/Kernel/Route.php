<?php

namespace App\Kernel;

class Route
{
    private static string $namespace = "App\Http\Controllers\\";
    private static array $routes = [];

    public static function get(string $uri, string $controller): void
    {
        self::addRoute($controller, 'GET', $uri);
    }

    private static function extract(string $controller): array
    {
        $arr_str = explode('@', $controller);
        list($controller, $action) = $arr_str;

        return [$controller, $action];
    }

    private static function addRoute(string $controller, string $method, string $uri): void
    {
        if (!array_key_exists($method, self::$routes)) {
            self::$routes[$method] = [];
        }

        list($controller, $action) = self::extract($controller);

        self::$routes[$method][$uri] = [
            "controller" => $controller,
            "action" => $action
        ];
    }

    public static function run(string $method, string $uri): void
    {
        if (array_key_exists($method, self::$routes) && array_key_exists($uri, self::$routes[$method])) {
            $controller = self::$namespace . self::$routes[$method][$uri]['controller'];
            $action = self::$routes[$method][$uri]['action'];
            $controller = new $controller();
            $controller->{$action}();
        } else {
            echo view('404', ['name' => '404']);
        }
    }
}