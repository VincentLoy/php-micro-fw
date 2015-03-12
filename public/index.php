<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 13:45
 */

use App\App;
use App\Config;

require '../app/Autoloader.php';

App\Autoloader::register();

$app = App::getInstance();
$app->title = "Titre de test";


$config = Config::getInstance();