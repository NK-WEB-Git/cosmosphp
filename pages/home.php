<ul>
    <?php

        $data = App\Table\Article::getLast();

        foreach($data as $one) {
            ?>
            <h2>
                <a href="<?= $one->url; ?>"><?= $one->titre; ?></a>
            </h2>

            <?= $one->extrait; ?>

            <?php
        }
    ?>
</ul>
