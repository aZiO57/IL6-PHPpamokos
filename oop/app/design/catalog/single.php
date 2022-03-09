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
        <?php if ($this->isUserLoged()) : ?>
            <a href="<?= $this->url('message/chat/' . $ad->getUserId()) ?>">
                Rasyti zinute savininkui
            </a>
        <?php endif; ?>
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