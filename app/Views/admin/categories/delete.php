<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 13/03/2015
 * Time: 17:26
 */

use Core\HTML\BootstrapForm;

$categoriesTable = App::getInstance()->getTable('Category');

if(!empty($_POST)) {
    $result = $categoriesTable->delete($_POST['id']);
    header("Location: admin.php?page=categories.index");
}