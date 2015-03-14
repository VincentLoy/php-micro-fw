<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 14/03/2015
 * Time: 17:54
 */

namespace App\Controller\Users;

use App;
use App\Controller\AppController;
use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;

class UsersController  extends AppController {

    public function loginAction() {
        $errors = false;

        if(!empty($_POST)) {
            $auth = new DBAuth(App::getInstance()->getDb());
            if($auth->login($_POST['username'], $_POST['password'])) {

                header("Location: index.php?page=admin.posts.index");

            }
            else {
                $errors = true;
            }
        }

        $form = new BootstrapForm($_POST);

        $this->render('users.login', compact('form', 'errors'));
    }

    public function logoutAction() {
        if(isset($_SESSION['auth'])) {
            session_unset();
            session_destroy();
        }
        header("Location: index.php");
    }
}