<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 13/03/2015
 * Time: 17:11
 */

namespace Core\Auth;

use Core\Database\Database;

class DBAuth {

    private $db;

    /**
     * @param Database $db
     */
    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getUserId() {
        if($this->logged()) {
            return $_SESSION['auth'];
        }
        return false;
    }


    /**
     * @param $username String
     * @param $password String
     * @return boolean
     */
    public function login($username, $password) {
        $user = $this->db->prepare("SELECT * FROM users WHERE username = ?", [$username], null, true);

        if($user) {
            if($user->password === sha1($password)) {
                $_SESSION['auth'] = $user->id;
                $_SESSION['username'] = $user->username;
                return true;
            }
            return false;
        }
        return false;
    }

    public function logged() {
        return isset($_SESSION['auth']);
    }

}