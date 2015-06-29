<?php

    $data = App\Table\Article::getLastWithCategories();

    foreach($data as $one) {
        ?>
        <h2>
            <a href="<?= $one->url; ?>"><?= $one->titre; ?></a>
        </h2>
        <p><em><?= $one->categorie ?></em></p>

        <?= $one->extrait; ?>

        <?php
    }
?>

<h1>Liste des categories de l'appli</h1>

<?php

$allCategories = App\Table\Categorie::all();

foreach($allCategories as $categorie) {
    ?>
    <p>
        <a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a>
    <p>

<?php
}

?>

