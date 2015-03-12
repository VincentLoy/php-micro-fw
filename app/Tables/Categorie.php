<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 15:58
 */

namespace App\Tables;

use App\App;

class Categorie extends Table{

    protected static $table = 'categories';

    public function getUrl() {
        return 'index.php?page=categorie&id=' . $this->id;
    }

}