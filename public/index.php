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


ob_start();
if( $page === 'home' ) {
    require '../pages/home.php';
}
elseif( $page == 'single' ) {
    require '../pages/single.php';
}

$content = ob_get_clean();

require '../pages/templates/default.php';