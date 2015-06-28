<?php

/* Connexion à une base ODBC avec l'invocation de pilote */
$dsn = 'mysql:dbname=blog;host=localhost';
$user = 'root';
$password = 'root';

try {
    $dbh = new PDO($dsn, $user, $password);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $count = $dbh->exec('INSERT INTO article SET titre="Loup de Wall Street", contenu="Grand film avec Leonardo", date="'.date('Y-m-d H:i:s').'"');

    var_dump($count);

} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
?>


<h1>Je suis la homepage</h1>
<p><a href="index.php?p=single">Aller au single</a></p>
