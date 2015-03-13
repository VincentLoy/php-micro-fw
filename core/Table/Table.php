<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 15:58
 */

namespace Core\Table;

use Core\Database\Database;

class Table {

    /**
     * @var
     */
    protected $table;
    /**
     * @var
     */
    protected $db;

    /**
     * @param Database $db
     */
    public function __construct(Database $db) {

        $this->db = $db;

        if(is_null($this->table)) {
            $this->db = $db;
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);

            $this->table= strtolower(str_replace('Table', '', $class_name) . 's');

        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id) {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }

    /**
     * @return mixed
     */
    public function all() {

        return $this->query('SELECT * FROM ' . $this->table);

    }


    /**
     * @param $id
     * @param $fields
     * @return mixed
     */
    public function update($id, $fields) {

        $sql_parts = [];
        $attributes = [];

        foreach($fields as $key => $value) {
            $sql_parts[] = "$key = ?";
            $attributes[] = $value;
        }

        $attributes[] = $id;
        $sql_part = implode(', ', $sql_parts);

        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?", $attributes, true);
    }


    public function create($fields) {

        $sql_parts = [];
        $attributes = [];

        foreach($fields as $key => $value) {
            $sql_parts[] = "$key = ?";
            $attributes[] = $value;
        }
        $sql_part = implode(', ', $sql_parts);

        return $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes, true);
    }

    /**
     * @param $key
     * @param $value
     * @return array
     */
    public function toList($key, $value) {
        $records = $this->all();

        $return = [];

        foreach ($records as $v) {
            $return[$v->$key] = $v->$value;
        }

        return $return;

    }

    /**
     * @param $statement
     * @param null $attributes
     * @param bool $one
     * @return mixed
     */
    public function query($statement, $attributes = null, $one = false) {
        if($attributes) {
            return $this->db->prepare(
                $statement,
                $attributes,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }
        else {
            return $this->db->query(
                $statement,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }
    }




}