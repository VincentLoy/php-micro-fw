<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 15:58
 */

namespace App\Table;

class Table {

    protected $table;
    protected $db;

    public function __construct(\App\Database\Database $db) {

        $this->db = $db;

        if(is_null($this->table)) {
            $this->db = $db;
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);

            $this->table= strtolower(str_replace('Table', '', $class_name));

        }
    }

    public function all() {

        return $this->db->query('SELECT * FROM articles');

    }




}