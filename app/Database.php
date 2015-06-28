<?php

namespace App;
use \PDO;

class Database {

    private $dbName;
    private $dbHost;
    private $dbUser;
    private $dbPassword;
    private $pdo;

    public function __construct($dbName, $dbHost="localhost", $dbUser="root", $dbPassword="root") {

        $this->dbName = $dbName;
        $this->dbHost = $dbHost;
        $this->dbUser = $dbUser;
        $this->dbPassword = $dbPassword;

    }

    private function getPDO() {

        if($this->pdo === NULL) {
            $pdo = new PDO('mysql:dbname=blog;host=localhost', 'root', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }

    public function query($statement, $className) {


        $result = $this->getPDO()->query($statement);


        $data = $result->fetchAll(PDO::FETCH_CLASS, $className);

        return $data;
    }

}