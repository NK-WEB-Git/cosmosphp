<ul>
    <?php

        $data = App\App::getDatabase()->query('SELECT * FROM article','App\Table\Article');

        foreach($data as $one) {
            ?>
            <h2>
                <a href="<?= $one->getUrl(); ?>"><?= $one->titre; ?></a>
            </h2>

            <?= $one->getExtrait(); ?>

            <?php
        }
    ?>
</ul>
