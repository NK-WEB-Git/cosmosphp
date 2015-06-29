<ul>
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
</ul>
