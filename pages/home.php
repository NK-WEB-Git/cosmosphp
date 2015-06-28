<ul>
    <?php

        $data = $db->query('SELECT * FROM article');
        foreach($data as $one) {
            ?>
            <li>
                <a href="index.php?p=post&id=<?= $one->id; ?>"><?= $one->titre; ?></a>
            </li>
            <?php
        }
    ?>
</ul>
