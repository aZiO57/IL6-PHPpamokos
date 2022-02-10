<?php $ad = $this->data['ad']; ?>
<div class="wrapper">
    <h1><?php $ad->getTitle(); ?></h1>
    <div class="image-wrapper">
        <img src="<?php echo $ad->getImage() ?>">
    </div>
    <div class="price">
        <?php echo $ad->getPrice(); ?>
    </div>
    <div class="details">
        <p>
            <?php echo $ad->getDescription(); ?>
        </p>
    </div>
</div>