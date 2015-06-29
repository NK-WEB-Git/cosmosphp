<?php

namespace App\Table;
use App\App;

class Article extends Table {

    protected static $table = 'article';

    public static function getLastWithCategories() {

        return App::getDatabase()->query('
            SELECT article.id, article.titre, article.contenu, categories.titre as categorie
            FROM article
            LEFT JOIN categories
              ON categories.id = article.category_id'
            ,__CLASS__);

    }

    public function __get($key) {
        $method = 'get' .ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

    public function getUrl() {

        return 'index.php?p=article&id=' .$this->id;
    }

    public function getExtrait() {

        $html = '<p>' .$this->contenu. '</p>';
        $html .= '<p><a href="'.$this->getUrl().'">Voir la suite</a></p>';
        return $html;
    }
}