<?php

/* Connexion à une base ODBC avec l'invocation de pilote */


try {

    $database = new App\Database('blog');

    $data = $database->query('SELECT * FROM article');

    var_dump($data[0]->contenu);

} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
?>


<h1>Je suis la homepage</h1>
<p><a href="index.php?p=single">Aller au single</a></p>
