<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 13/03/2015
 * Time: 01:31
 */

namespace App\Entity;

use Core\Entity\Entity;

/**
 * Class CategoryEntity
 * @package App\Entity
 */
class CategoryEntity extends Entity{

    /**
     * @return string
     */
    public function getUrl() {
        return 'index.php?page=posts.category&id='.$this->id;
    }
}