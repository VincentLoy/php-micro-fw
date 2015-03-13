<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 15:58
 */

namespace App\Table;

use Core\Table\Table;

class PostTable extends Table {

    /**
     * Recupere les derniers articles
     * @return array
     */
   public function last() {
       return $this->query("
            SELECT articles.id, articles.title, articles.content, articles.date, categories.title as categorie
            FROM articles
            LEFT JOIN categories ON categorie_id = categories.id
            ORDER BY articles.date DESC
       ");
   }


}