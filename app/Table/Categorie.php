<?php

namespace App\Table;
use App\App;

class Categorie {

    private static $table = 'categories';

    public static function getLast() {

        return App::getDatabase()->query('SELECT * FROM '.self::$table, __CLASS__);
    }
}