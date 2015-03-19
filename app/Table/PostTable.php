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

    /**
     * @var string
     * nom de la table dans la base de donnée
     */
    protected $table = "articles";

    /**
     * @return mixed
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
     * @param $id
     * @return mixed
     */
    public function find($id) {
        return $this->query("
            SELECT articles.id, articles.title, articles.content, articles.date, categories.title as
            categorie, categories.id as categorie_id
            FROM articles
            LEFT JOIN categories ON categorie_id = categories.id
            WHERE articles.id = ?
       ", [$id], true);
    }

    /**
     * @param $id
     * @return mixed
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