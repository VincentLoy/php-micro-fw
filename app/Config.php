<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 19:58
 */

namespace App;


class Config {

    private $settings = [];

    public function __construct() {

        $this->$settings = require dirname(__DIR__) . '/config/config.php';

    }

}