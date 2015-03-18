<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 19:58
 */

namespace Core;

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
     * @param $file
     */
    public function __construct($file) {
        $this->settings = require($file);
    }

    /**
     * @param $key
     * @return null | array
     */
    public function get($key) {

        if(!isset($this->settings[$key])) {
            return null;
        }
        return $this->settings[$key];
    }

    /**
     * @param $file
     * @return Config
     * retourne une instance de la configuration
     */
    public static function getInstance($file) {
        if(is_null(self::$_instance)) {
            self::$_instance = new Config($file);
        }

        return self::$_instance;
    }

}