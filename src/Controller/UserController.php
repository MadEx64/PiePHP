<?php
namespace Controller;

use Core\Controller;
use Model\UserModel;

class UserController extends Controller
{

    public function addAction() {
        $this->render('register');
    }

    public function indexAction() {
        $this->render('index');
    }

    public function registerAction() {
        //var_dump($this->params);
        if (!isset($_SESSION['id_user'])) {
            $user = new UserModel($this->params);
            if (!$user->id) {
                $user->save();
                self::$_render = "Votre compte a été créé." . PHP_EOL;
                header('Location: /w2php502p1/');
                exit();
            }
        }
    }

    public function loginAction() {
        $this->render('login');
    }

    public function userAction() {
        $userLogin = new UserModel($this->params);
        $user = $userLogin->find(["WHERE" => "email = '" . $this->request->email ."'"]);
        if ($user[0]['email'] === $this->request->email && $user[0]['password'] === $this->request->password) {
            $_SESSION['id_user'] = $user[0]['id_user'];
            $this->render('index');
        }
        else {
            echo " FAILED TO CONNECT";
        }
    }
}
