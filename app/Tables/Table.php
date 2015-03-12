<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 15:58
 */

namespace App\Tables;

use App\App;

class Table {

    protected static $table;

    public static function find($id) {
        $req = App::getDb()->prepare("
            SELECT *
            FROM " . static::$table . "
            WHERE id = ?
        ", [$id], get_called_class(), true);

        return $req;
    }

    public static function getAll() {
        return App::getDb()->query("
          SELECT *
          FROM ".static::$table."", get_called_class());
    }

    public function __get($key) {
        $method = 'get' . ucfirst($key);

        $this->$key = $this->$method();

        return $this->$key;
    }

    public function getUrl() {
        return 'index.php?page=article&id=' . $this->id;
    }

    public static function query($statement, $attributes = null, $one = false) {

        if($attributes) {
            return App::getDb()->prepare($statement, $attributes, get_called_class(), $one);
        }
        else {
            return App::getDb()->query($statement, get_called_class(), $one);
        }
    }

}