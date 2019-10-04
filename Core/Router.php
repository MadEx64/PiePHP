<?php
namespace Core;

class Router
{
    private static $routes;

    public static function connect ($url, $route) {
        self::$routes[$url] = $route;
        //print_r(self::$routes[$url]);
    }

    public static function get ($url) {
        //echo "<pre>", var_dump($url), "URL</pre>";
        //var_dump(self::$routes);
        if(array_key_exists($url, self::$routes)) {
            return self::$routes[$url];
        }
        else {
            die("Error 404");
        }
    }
}
