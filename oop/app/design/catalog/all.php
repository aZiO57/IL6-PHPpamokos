<div class="wrapper">
    <?php foreach ($this->data['ads'] as $ad) : ?>
        <div class="box">
            <a href="<?= BASE_URL . 'catalog/show/' . $ad->getSlug() ?>">
                <img src="<?= $ad->getImage() ?>">
                <div class="title">
                    <?= $ad->getTitle() ?>
                </div>
                <div class="price">
                    <?= $ad->getPrice() ?>
                </div>
                <div class="years">
                    <?= $ad->getYear() ?>
                </div>
            </a>
        </div>
    <?php endforeach
    ?>
</div>