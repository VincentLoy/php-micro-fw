<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 14/03/2015
 * Time: 16:38
 */

namespace App\Controller;


use Core\Controller\Controller;

/**
 * Class AppController
 * @package App\Controller
 */
class AppController extends Controller {

    protected $template = 'default';

    /**
     * constructor
     */
    public function __construct() {
        $this->viewPath = ROOT . '/app/Views/';
    }

    /**
     * @param $model_name
     */
    protected function loadModel($model_name) {
        $this->$model_name = \App::getInstance()->getTable($model_name);
    }

}