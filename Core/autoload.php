<?php
spl_autoload_register(function ($class) {
    $file = str_replace("\\", DIRECTORY_SEPARATOR, $class . '.php');
    if (file_exists($file)) {
        require_once $file;
    }
    else {
        if (file_exists('src' . DIRECTORY_SEPARATOR . $file)) {
            require_once 'src' . DIRECTORY_SEPARATOR . $file;
        }
    }
});
