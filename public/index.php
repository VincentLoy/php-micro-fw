<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 13:45
 */

require '../app/Autoloader.php';

App\Autoloader::register();

if(isset($_GET['page'])) {

    $page = $_GET['page'];

}
else {
    $page = 'home';
}

if( $page === 'home' ) {
    require '../pages/home.php';
}