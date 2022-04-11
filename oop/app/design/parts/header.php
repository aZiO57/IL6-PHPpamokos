<html>

<head>
    <title><?= $this->data['title'] ?> </title>
    <meta name="description" content="<?= $this->data['meta_description'] ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL_WITHOUT_INDEX_PHP . '/pub/css/style.css'; ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="sliding-part">
            Autoshop 10% nuolaida su kodu "Kibiras".
        </div>
        <nav>
            <ul>
                <li>
                    <img class="logo" src="https://freesvg.org/img/VintageCar.png">
                </li>
                <li>
                    <a href="<?php echo $this->url(''); ?>">Home Page</a>
                </li>
                <li>
                    <a href="<?php echo $this->url('catalog') ?>">All advertisements</a>
                </li>
                <?php if ($this->isUserLoged()) : ?>
                    <li>
                        <a href="<?= $this->url('message') ?>">Messages(<?= $this->data['new_messages'] ?>)</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->url('catalog/add') ?>">Add new advertisement</a>
                    </li>
                    <li>
                        <a href="<?= $this->url('user/favorite') ?>">Favorite ads</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->url('user/logout') ?>">Logout</a>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="<?php echo $this->url('user/login') ?>">Login</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->url('user/register') ?>">Sign Up</a>
                    </li>
                <?php endif; ?>
                <?php if ($this->isUserAdmin()) : ?>
                    <li>
                        <a href="<?php echo $this->url('admin') ?>">ADMIN</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>