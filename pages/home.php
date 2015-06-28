<?php

/* Connexion à une base ODBC avec l'invocation de pilote */
$dsn = 'mysql:dbname=blog;host=localhost';
$user = 'root';
$password = 'root';

try {
    $dbh = new PDO($dsn, $user, $password);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $result = $dbh->query('SELECT * FROM article');

    $data = $result->fetchAll(PDO::FETCH_OBJ);

    var_dump($data[0]->titre);

} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
?>


<h1>Je suis la homepage</h1>
<p><a href="index.php?p=single">Aller au single</a></p>
