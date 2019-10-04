<?php
namespace Core;

use Core\Router;
use Controller\AppController;

class Core
{
    public function run() {

        $uri = str_replace(BASE_URI, '', $_SERVER['REQUEST_URI']);
        //$uri = trim($uri, '/');
        require 'src/routes.php';
        $routes = Router::get($uri);
        $controller = "Controller\\" . ucfirst($routes['controller']) . "Controller";
        //var_dump($controller);
        $routeAction = $routes['action'] . "Action";
        //var_dump($routeAction);

        if(class_exists($controller) && method_exists($controller, $routeAction)) {
            $runRoutes = new $controller;
            $runRoutes->$routeAction();
        }

        /*if(class_exists($controller) && method_exists($controller, 'indexAction') && !isset($routeAction)) {
            $runRoutes = new $controller;
            $runroutes->indexAction();
        }
        else if(!isset($routes['controller']) && !isset($routes['action'])) {
            if(class_exists('AppController') && method_exists('AppController', 'indexAction')) {
                $runroutes = new AppController;
                $runroutes->indexAction();
        }*/
        else {
            echo "Error 404";
            header("Location: ./src/View/Error/404.php");
            exit;
        }
    }
}
