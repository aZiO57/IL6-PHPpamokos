<h1>Home Page</h1>

<h4>Parduok savo automobili uz centus, tik pas mus!</h4>

<h5> Recent Ads </h5>
<div class="box_wrapper">
    <?php foreach ($this->data['recentAds'] as $ad) : ?>
        <div class="box">
            <a href="<?= BASE_URL . 'catalog/show/' . $ad->getSlug() ?>">
                <img src="<?= $ad->getImage() ?>">
                <div class="title">
                    <?= $ad->getTitle() ?>
                </div>
                <div class="price">
                    <?= $ad->getPrice() ?> €
                </div>
                <div class="years">
                    <?= $ad->getYear() ?> m.
                </div>
            </a>
        </div>
    <?php endforeach
    ?>
</div>
<h5> Popular Ads </h5>
<div class="box_wrapper">
    <?php foreach ($this->data['popularAds'] as $ad) : ?>
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