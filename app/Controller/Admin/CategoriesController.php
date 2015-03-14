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

class CategoriesController extends AppController{

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }


    public function indexAction() {
        $categories = $this->Category->all();
        $this->render('admin.categories.index', compact('categories'));
    }

    public function addAction() {

        if(!empty($_POST)) {
            $result = $this->Category->create([
                'title' => $_POST['title'],
            ]);

            if($result) {
               return $this->indexAction();
            }
        }

        $form = new BootstrapForm($_POST);

        $this->render('admin.categories.add', compact('form'));
    }

    public function editAction() {

        if(!empty($_POST)) {
            $result = $this->Category->update($_GET['id'], [
                'title' => $_POST['title'],
            ]);

            if($result) {
                return $this->indexAction();
            }
        }
        $post = $this->Category->find($_GET['id']);

        $form = new BootstrapForm($post);

        $this->render('admin.categories.edit', compact('form'));
    }

    public function deleteAction() {

        if(!empty($_POST)) {
            $result = $this->Category->delete($_POST['id']);

            return $this->indexAction();
        }
    }

}