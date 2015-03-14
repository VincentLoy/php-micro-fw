<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 13:45
 */



define('ROOT', dirname(__DIR__));

require ROOT.'/app/App.php';

App::load();


if(isset($_GET['page'])) {

    $page = $_GET['page'];

}
else {
    $page = 'home';
}

ob_start();
if($page === 'home') {
    require ROOT . '/pages/posts/home.php';
}
elseif($page === 'post.categorie') {
    require ROOT . '/pages/posts/categories.php';
}
elseif($page === 'post.single') {
    require ROOT . '/pages/posts/single.php';
}
elseif($page === 'login') {
    require ROOT . '/pages/users/login.php';
}
elseif($page === 'logout') {
    require ROOT . '/pages/users/logout.php';
}

$content = ob_get_clean();
require ROOT . '/pages/templates/default.php';