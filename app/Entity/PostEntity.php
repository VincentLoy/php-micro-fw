<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 13/03/2015
 * Time: 01:31
 */

namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity{

    public function getUrl() {
        return 'index.php?page=post.single&id='.$this->id;
    }

    public function getExtrait() {

        $html = "<p>". substr($this->content, 0, 100) . '...</p>';
        $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';

        return $html;
    }
}