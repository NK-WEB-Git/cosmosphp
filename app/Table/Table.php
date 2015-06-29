<?php

namespace App\Table;
use App\App;

class Table {

    protected static $table;

    public static function all() {

        return App::getDatabase()->query('SELECT * FROM ' .static::$table, get_called_class());
    }

    public function __get($key) {
        $method = 'get' .ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

}