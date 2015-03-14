<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 13:45
 */



define('ROOT', dirname(__DIR__));

require ROOT.'/App/App.php';

App::load();


if(isset($_GET['page'])) {

    $page = $_GET['page'];

}
else {
    $page = 'posts.index';
}

/*
 * Ceci va appeller les pages sous la forme : page=CONTROLLER.ACTION
 */
$page = explode('.', $page);
if($page[0] === 'admin') {
    $controller = '\App\Controller\Admin\\' .ucfirst($page[1]) . 'Controller';
    $action = $page[2].'Action';
}
else{
    $controller = '\App\Controller\\' .ucfirst($page[0]) . 'Controller';
    $action = $page[1].'Action';
}

$controller = new $controller();
$controller->$action();