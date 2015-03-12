<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 12/03/2015
 * Time: 15:58
 */

namespace App\Tables;

use App\App;

class Article extends Table {

    protected static $table = 'articles';

    public static function find($id) {
        $req = self::query("
            SELECT articles.id, articles.title, articles.content, categories.title as categorie
            FROM articles
            LEFT JOIN categories ON categorie_id = categories.id
            WHERE articles.id = ?
        ", [$id], true);

        return $req;
    }

    public static function getLast() {
        return self::query("
          SELECT articles.id, articles.title, content, categories.title as categorie
          FROM articles
          LEFT JOIN categories ON categorie_id = categories.id
          ORDER BY articles.date DESC");
    }

    public static function lastByCategory($cat_id) {

        return self::query("
          SELECT articles.id, articles.title, content, categories.title as categorie
          FROM articles
          LEFT JOIN categories ON categorie_id = categories.id
          WHERE categorie_id = ?", [$cat_id]);

    }

    public function getUrl() {
        return 'index.php?page=article&id=' . $this->id;
    }

    public function getExtrait() {

        $html = '<p>' . substr($this->content, 0, 100) . '...<p>';

        $html .= '<p><a href="' . $this->getURL() . '">Lire la suite</a></p>';

        return $html;
    }

}