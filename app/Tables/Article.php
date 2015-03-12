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

    public static function getLast() {
        return self::query("
          SELECT articles.id, articles.title, content, categories.title as categorie
          FROM articles
          LEFT JOIN categories ON categorie_id = categories.id");
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