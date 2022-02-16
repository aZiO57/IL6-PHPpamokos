<html>

<head>
    <title>Autominusas</title>
    <link rel="stylesheet" href="<?php echo BASE_URL_WITHOUT_INDEX_PHP . 'css/style.css'; ?>">
</head>

<body>
    <header>
        <div class="sliding-part">
            Autoshop 10% nuolaida su kodu "Kibiras".
        </div>
        <nav>
            <ul>
                <li>
                    <a href="<?= $this->url(''); ?>">Home Page</a>
                </li>
                <li>
                    <a href="<?= $this->url('catalog/all') ?>">All ads</a>
                </li>
                <?php if ($this->isUserLoged()) : ?>
                    <li>
                        <a href="<?= $this->url('catalog/add') ?>">Add New</a>
                    </li>
                    <li>
                        <a href="<?= $this->url('user/logout') ?>">Logout</a>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="<?= $this->url('user/login') ?>">Login</a>
                    </li>
                    <li>
                        <a href="<?= $this->url('user/register') ?>">Sign Up</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>