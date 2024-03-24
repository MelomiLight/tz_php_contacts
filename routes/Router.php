<?php

class Router
{
    private static $routes = [];

    public static function get($path, $handler)
    {
        self::$routes[] = ['path' => $path, 'method' => 'GET', 'handler' => $handler];
    }

    public static function post($path, $handler)
    {
        self::$routes[] = ['path' => $path, 'method' => 'POST', 'handler' => $handler];
    }

    public static function put($path, $handler)
    {
        self::$routes[] = ['path' => $path, 'method' => 'PUT', 'handler' => $handler];
    }

    public static function delete($path, $handler)
    {
        self::$routes[] = ['path' => $path, 'method' => 'DELETE', 'handler' => $handler];
    }
    public static function dispatch($requestUri, $requestMethod)
    {
        foreach (self::$routes as $route) {
            if ($route['path'] === $requestUri && $route['method'] === $requestMethod) {
                return $route['handler']();
            }
        }

        header('HTTP/1.1 404 Not Found');
        echo '404 Not Found';
    }
}
