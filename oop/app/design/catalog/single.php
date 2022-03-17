<?php

use Helper\Url;

$ad = $this->data['ad']; ?>
<div class="wrapper">
    <div class="post-content">
        <?php
        if (!empty($_SESSION['user_id'])) {
            if ($_SESSION['user_id'] === $ad->getUserId()) {
                echo  "<a href='" . Url::link("catalog/edit", $ad->getId()) . "'><div class='edit-ad'>
            Redaguoti skelbima
        </div> </a>";
            }
        } ?>
        <h1><?= $ad->getTitle(); ?></h1>
        <?php if ($this->isUserLoged()) : ?>
            <form action="<?= $this->url('catalog/favorite') ?>" method="POST">
                <?php $label = $this->data['saved_ad'] == null ? 'Isiminti' : 'Pamirsti'; ?>
                <input type="hidden" value="<?= $ad->getId(); ?>" name="ad_id">
                <input type="submit" value="<?= $label ?>" name="save">
            </form>
        <?php endif; ?>
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
        <br>
        <a href="<?= $this->url('message/chat/' . $ad->getUserId()) ?>">
            Rasyti zinute savininkui
        </a>
        <br>
        <span>Skelbimo ivertinimas(<?= $this->data['rating_count'] ?>):</span>
        <?= $this->data['ad_rating'] ?>
        <?php if ($this->isUserLoged()) : ?>

            <form action="<?= $this->url('catalog/rate') ?>" method="POST">
                <input type="hidden" name="ad_id" value="<?= $ad->getId(); ?>">
                <?php for ($i = 1; $i <= 5; $i++) : ?>
                    <input type="radio" <?php if ($this->data['rated'] && $this->data['user_rate'] == $i) : ?> checked <?php endif; ?> value="<?= $i ?>" name="rate">
                <?php endfor; ?>
            <?php endif; ?>
            <br>
            <input type="submit" value="Rate this Ad" name="rate_submit">
            </form>
            <div class="comments-wrapper">
                <p>
                    <?= $this->data['comment_form'] ?>
                </p>
                <?php foreach ($this->data['comments'] ?? [] as $comment) : ?>
                    <div class="comment">
                        <div class="comment_user">
                            <?php $author = $comment->getUser() ?>
                            <?= $author->getName() ?>
                            <?= $author->getLastName() ?>
                        </div>
                        <div class="comment_date">
                            <?= $comment->getDate() ?>
                        </div>
                        <div class="comment_content">
                            <p><?= $comment->getMessage() ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
    </div>
</div>