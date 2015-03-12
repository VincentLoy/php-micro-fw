<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 15:17
 */

namespace App\Database;

use \PDO;

class MysqlDatabase extends Database {

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;

    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost' ) {

        $this->db_name = $db_name;
        $this->db_host = $db_host;
        $this->db_pass = $db_pass;
        $this->db_user = $db_user;

    }

    private function getPDO() {

        // permet d'avoir UNE SEULE instance de PDO.
        if($this->pdo === null) {
            $pdo = new PDO('mysql:dbname=base_blog;host=localhost', 'root', '');
            //permet d'afficher une erreur en cas de pblm avec la requete SQL
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }

    public function query($statement, $class_name = null, $one = false) {

        $req = $this->getPDO()->query($statement);

        if($class_name === null) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        }
        else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }

        if($one) {
            $datas = $req->fetch();
        }
        else {
            $datas = $req->fetchAll();
        }

        return $datas;
    }

    public function prepare($statement, $attributes, $class_name, $one = false) {

        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);

        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if($one) {
            $datas = $req->fetch();
        }
        else {
            $datas = $req->fetchAll();
        }

        return $datas;

    }

}