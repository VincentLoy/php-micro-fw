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
 * Class PostEntity
 * @package App\Entity
 */
class PostEntity extends Entity{

    /**
     * @return string
     */
    public function getUrl() {
        return 'index.php?page=posts.show&id='.$this->id;
    }

    /**
     * @return string
     * retourne l'extrait d'un article
     */
    public function getExtrait() {

        $html = "<p>". substr($this->content, 0, 100) . '...</p>';
        $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';

        return $html;
    }
}