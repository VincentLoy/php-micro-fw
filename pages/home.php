<?php

use App\Database;

$db = new Database('base_blog');

$datas = $db->query('SELECT * FROM articles');

var_dump($datas);