<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 13/03/2015
 * Time: 01:31
 */

namespace App\Entity;

use Core\Entity\Entity;

class CategoryEntity extends Entity{

    public function getUrl() {
        return 'index.php?page=posts.category&id='.$this->id;
    }
}