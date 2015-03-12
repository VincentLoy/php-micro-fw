<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 17:05
 */

namespace App;


class App {

    const DB_NAME = 'base_blog';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_HOST = 'localhost';

    private static $database;
    private static $title = 'Mon super blog';


    public static function getDb() {
        if( self::$database === null ) {
            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
        }
        return self::$database;
    }

    public static function notFound() {

        header("HTTP/1.0 404 Not Found");
        header("Location: index.php?page=404");

    }

    public static function getTitle() {

        return self::$title;

    }

    public static function setTitle($title) {

        self::$title = $title ." | ". self::getTitle();
    }

}