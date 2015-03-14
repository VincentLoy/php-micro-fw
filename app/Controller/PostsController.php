<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 14/03/2015
 * Time: 16:22
 */

namespace App\Controller;


class PostsController extends AppController{

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function indexAction() {
        $posts = $this->Post->last();
        $categories = $this->Category->all();

        $vars = compact('posts', 'categories'); //compact genere un array en fonction de plusieurs variables.

        $this->render('posts.index', $vars);
    }

    public function categoryAction() {

        $category = $this->Category->find($_GET['id']);

        if($category === false) {
            $this->notFound();
        }

        $articles = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();

        $vars = compact('articles', 'categories', 'category');

        $this->render('posts.categories', $vars);
    }

    public function showAction() {
        $post = $this->Post->find($_GET['id']);

        if($post === false) {
            $this->notFound();
        }

        $vars = compact('post');

        $this->render('posts.single', $vars);
    }

}