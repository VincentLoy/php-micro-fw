<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 17:05
 */

namespace App;


class App {

    private static $_instance;
    public $title = "Mon Super Blog";


    public static function getInstance() {

        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

}