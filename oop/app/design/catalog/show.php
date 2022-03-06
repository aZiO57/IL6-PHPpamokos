<div class="comments-wrapper">
    <?= $this->data['comment_box'] ?>
    <?php if (isset($_SESSION['comment_error'])) : ?>
        <?= $_SESSION['comment_error']; ?>
    <?php endif; ?>
    <div class="comments">
        <h3>Comments</h3>

        <?php
        var_dump($this->data);
        die;
        foreach ($this->data['comment'] as $comment) : ?>
            <div class="comment">
                <div class="comment_user">
                    <?php $author = $comment->getUser() ?>
                    <?= $author->getName() ?>
                    <?= $author->getLastName() ?>
                </div>
                <div class="comment_date">
                    <?= $comment->getCreatedAt() ?>
                </div>
                <div class="comment_content">
                    <p><?= $comment->getComment() ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>