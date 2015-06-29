<?php

namespace App;

class App {

    const DB_NAME = 'blog';
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = 'root';

    private static $database;

    public static function getDatabase() {

        if(self::$database === null) {
            self::$database = new Database(self::DB_NAME);
        }

        return self::$database;
    }
}