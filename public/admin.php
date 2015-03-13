<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 13:45
 */


use Core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));

require ROOT.'/app/App.php';

App::load();


if(isset($_GET['page'])) {

    $page = $_GET['page'];

}
else {
    $page = 'home';
}

//Auth
$app = App::getInstance();

$auth = new DBAuth($app->getDb());

if(!$auth->logged()){
    $app->forbidden();
}

ob_start();
if($page === 'home') {
    require ROOT . '/pages/admin/posts/index.php';
}
elseif($page === 'post.categorie') {
    require ROOT . '/pages/admin/posts/categories.php';
}
elseif($page === 'post.single') {
    require ROOT . '/pages/admin/posts/single.php';
}

$content = ob_get_clean();
require ROOT . '/pages/templates/default.php';