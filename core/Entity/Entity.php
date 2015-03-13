<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 13/03/2015
 * Time: 01:45
 */

namespace Core\Entity;

class Entity {

    public function __get($key) {

        $method = 'get' . ucfirst($key);

        $this->$key = $this->$method();

        return $this->$key;

    }

}