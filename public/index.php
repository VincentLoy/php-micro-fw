<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 13:45
 */

use App\App;

require '../app/Autoloader.php';

\App\Autoloader::register();

$app = App::getInstance();

$posts = $app->getTable('Posts');

var_dump($posts->all());