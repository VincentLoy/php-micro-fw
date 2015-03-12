<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 19:58
 */

namespace App;

/**
 * Class Config
 * @package App
 * @author : Vincent Loy <vincent.loy1@gmail.com>
 * Cette classe respecte le pattern Singleton. Cela permet de retourner toujours la même instance de l'objet config.
 */
class Config {

    private $settings = [];
    private static $_instance;

    /**
     *
     */
    public function __construct() {
        $this->settings = require dirname(__DIR__) . '/config/config.php';
    }

    public function get($key) {

        if(!isset($this->settings[$key])) {
            return null;
        }
        return $this->settings[$key];
    }

    public static function getInstance() {
        if(is_null(self::$_instance)) {
            self::$_instance = new Config();
        }

        return self::$_instance;
    }

}