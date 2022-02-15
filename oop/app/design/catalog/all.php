<div class="wrapper">
    <?php foreach ($this->data['ads'] as $ad) : ?>
        <div class="box">
            <a href="<?php echo BASE_URL . 'catalog/show/' . $ad->getSlug() ?>">
                <img src="<?php echo $ad->getImage() ?>">
                <div class="title">
                    <?php echo $ad->getTitle() ?>
                </div>
                <div class="price">
                    <?php echo $ad->getPrice() ?>
                </div>
            </a>
        </div>
    <?php endforeach; //set image aprasyti ~5 eilutej
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