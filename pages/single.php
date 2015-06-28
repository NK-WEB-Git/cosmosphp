<?php

    $article = $db->prepare('SELECT * FROM article WHERE id = ?', [$_GET['id']], 'App\Table\Article', true);
?>

<h2><?= $article->titre; ?></h2>
<p><?= $article->contenu; ?></p>