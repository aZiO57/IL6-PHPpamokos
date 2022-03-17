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
    <?php endforeach; ?>
</div>

<div class="paginator">
    <?php if ($this->data['currentPage'] > 1) : ?>
        <div class="pageLink">
            <a href="<?= BASE_URL . 'catalog?page=' . ($this->data['currentPage'] - 1) ?>"> Previous page
            </a>
        </div>
    <?php endif ?>
    <div class="pageLink">
        <&nbsp; <?= $this->data['currentPage'] ?> &nbsp;>
    </div>
    <?php if ($this->data['currentPage'] < ($this->data['pageCount'])) : ?>
        <div class="pageLink">
            <a href="<?= BASE_URL . 'catalog?page=' . ($this->data['currentPage'] + 1) ?>"> Next page
            </a>
        </div>
    <?php endif ?>
</div>