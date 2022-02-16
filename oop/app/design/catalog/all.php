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

<!-- <div class="ad-wrapper">
    <h1><?php echo $this->data['ads']->getTitle(); ?></h1>
    <div class="ad-image-wrapper">
        <img src="<?php echo $this->data['ad']->getImageUrl(); ?>" />
    </div>
    <p><?php echo $this->data['ad']->getDescription(); ?></p>
    <div class="ad-price"><?php echo $this->data['ad']->getPrice(); ?>€</div>
    <div class="ad-year"><?php echo $this->data['ad']->getYear(); ?></div>
</div> -->