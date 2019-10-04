<?php
namespace Core;

class Controller
{
    protected static $_render;
    public $request;
    public $params;

    public function __construct() {
        $this->request = new Request();
        //var_dump($this->request);
        $this->params = get_object_vars($this->request);
        //var_dump($this->params);
    }

    protected function render($view, $scope = []) {
        extract($scope);
        //var_dump($scope);
        //var_dump(str_replace('\\', '', basename(get_class($this))));
        $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace('Controller', '', str_replace('\\', '', basename(get_class($this)))), $view]) . '.php';
        //var_dump($f);
        if (file_exists($f)) {
            ob_start();
            include($f);
            $view = ob_get_clean();
            ob_start();
            include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php');
            self::$_render = ob_get_clean();
        }
    }

    public function __destruct() {
        echo self::$_render;
    }
}
