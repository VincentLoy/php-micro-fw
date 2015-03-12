<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 13:45
 */

require '../app/Autoloader.php';

use \App\Database;

App\Autoloader::register();

if(isset($_GET['page'])) {

    $page = $_GET['page'];

}
else {
    $page = 'home';
}


ob_start();
if( $page === 'home' ) {
    require '../pages/home.php';
}
elseif( $page == 'article' ) {
    require '../pages/single.php';
}
elseif( $page == 'categorie' ) {
    require '../pages/categorie.php';
}

$content = ob_get_clean();

require '../pages/templates/default.php';