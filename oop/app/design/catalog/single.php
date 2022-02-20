<?php

use Helper\Url;

$ad = $this->data['ad']; ?>
<div class="wrapper">
    <div class="post-content">
        <h1><?= $ad->getTitle(); ?></h1>
        <?php
        if (!empty($_SESSION['user_id'])) {
            if ($_SESSION['user_id'] === $ad->getUserId()) {
                echo  "<a href='" . Url::link("catalog/edit", $ad->getId()) . "'><div class='edit-ad'>
            Redaguoti skelbima
        </div> </a>";
            }
        } ?>
        <div class="image-wrapper">
            <img src="<?= $ad->getImage() ?>">
        </div>
        <div id="price" class="price">
            <?= $ad->getPrice(); ?> €
        </div>
        <div class="years">
            <?= $ad->getYear(); ?> metai
        </div>
        <div class="details">
            <p>
                <?= $ad->getDescription(); ?>
            </p>
        </div>
    </div>
</div>