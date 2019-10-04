<?php
use Core\Router;

Router::connect('/', ['controller' => 'app', 'action' => 'index']);

Router::connect('/user', ['controller' => 'user', 'action' => 'user']);
Router::connect('/register', ['controller' => 'user', 'action' => 'add']);
Router::connect('/add', ['controller' => 'user', 'action' => 'register']);
Router::connect('/login', ['controller' => 'user', 'action' => 'login']);
Router::connect('/edit', ['controller' => 'user', 'action' => 'edit']);

Router::connect('/article', ['controller' => 'article', 'action' => 'show']);
