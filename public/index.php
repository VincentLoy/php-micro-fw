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


if($page === 'home') {
    $controller = new \App\Controller\PostsController();
    $controller->indexAction();
}
elseif($page === 'post.category') {
    $controller = new \App\Controller\PostsController();
    $controller->categoryAction();
}
elseif($page === 'post.single') {
    $controller = new \App\Controller\PostsController();
    $controller->showAction();
}
elseif($page === 'login') {
    $controller = new \App\Controller\Users\UsersController();
    $controller->loginAction();
}
elseif($page === 'logout') {
    $controller = new \App\Controller\Users\UsersController();
    $controller->logoutAction();
}
elseif($page === 'admin.posts.index') {
    $controller = new \App\Controller\Admin\PostsController();
    $controller->indexAction();
}
elseif($page === 'admin.posts.add') {
    $controller = new \App\Controller\Admin\PostsController();
    $controller->addAction();
}
elseif($page === 'admin.posts.edit') {
    $controller = new \App\Controller\Admin\PostsController();
    $controller->editAction();
}
elseif($page === 'admin.posts.delete') {
    $controller = new \App\Controller\Admin\PostsController();
    $controller->deleteAction();
}