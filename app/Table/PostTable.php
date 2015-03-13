<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 15:58
 */

namespace App\Table;

use Core\Table\Table;

/**
 * Class PostTable
 * @package App\Table
 * Table qui se charge des requetes sur la table des articles
 */
class PostTable extends Table {

    protected $table = "articles";

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

    /**
     * Recupere un article avec sa categorie
     * @param $id int
     * @return \App\Entity\PostEntity
     */
    public function find($id) {
        return $this->query("
            SELECT articles.id, articles.title, articles.content, articles.date, categories.title as categorie
            FROM articles
            LEFT JOIN categories ON categorie_id = categories.id
            WHERE articles.id = ?
       ", [$id], true);
    }

    /**
     * Recupere tous les articles d'une categorie
     * @param $id int
     * @return array
     */
    public function lastByCategory($id) {
        return $this->query("
            SELECT articles.id, articles.title, articles.content, articles.date, categories.title as categorie
            FROM articles
            LEFT JOIN categories ON categorie_id = categories.id
            WHERE articles.categorie_id = ?
            ORDER BY articles.date DESC
       ", [$id]);
    }


}