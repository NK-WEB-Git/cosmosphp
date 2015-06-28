<ul>
    <?php

        $data = $db->query('SELECT * FROM article','App\Table\Article');

        foreach($data as $one) {
            ?>
            <h2>
                <a href="<?= $one->getUrl(); ?>"><?= $one->titre; ?></a>
            </h2>

            <p>
                <?= $one->getExtrait(); ?>
            </p>
            <?php
        }
    ?>
</ul>
