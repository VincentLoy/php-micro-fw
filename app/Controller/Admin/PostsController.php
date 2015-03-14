<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 14/03/2015
 * Time: 16:22
 */

namespace App\Controller\Admin;


use App;
use Core\HTML\BootstrapForm;

class PostsController extends AppController{

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }


    public function indexAction() {
        $posts = $this->Post->all();
        $this->render('admin.posts.index', compact('posts'));
    }

    public function addAction() {

        if(!empty($_POST)) {
            $result = $this->Post->create([
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'categorie_id' => $_POST['categorie_id'],
            ]);

            if($result) {
               return $this->indexAction();
            }
        }

        $categories = $this->Category->toList('id', 'title');

        $form = new BootstrapForm($_POST);

        $this->render('admin.posts.add', compact('form', 'categories'));
    }

    public function editAction() {

        $success = false;

        if(!empty($_POST)) {
            $result = $this->Post->update($_GET['id'], [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'categorie_id' => $_POST['categorie_id'],
            ]);

            if($result) {
                return $this->indexAction();
            }
        }
        $post = $this->Post->find($_GET['id']);

        $categories = $this->Category->toList('id', 'title');

        $form = new BootstrapForm($post);

        $this->render('admin.posts.edit', compact('form', 'categories'));
    }

    public function deleteAction() {

        if(!empty($_POST)) {
            $result = $this->Post->delete($_POST['id']);
            header("Location: index.php?page=admin.posts.index");
        }
    }

}