<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 14/03/2015
 * Time: 17:16
 */

namespace App\Controller\Admin;


use App;
use App\Controller\AppController as MainAppController;
use Core\Auth\DBAuth;

class AppController extends MainAppController {

    public function __construct() {
        parent::__construct();
        //Auth
        $app = App::getInstance();

        $auth = new DBAuth($app->getDb());

        if(!$auth->logged()){
            $this->forbidden();
        }
    }
}