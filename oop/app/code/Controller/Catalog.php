<?php

declare(strict_types=1);

namespace Controller;

use Core\AbstractController;
use Helper\FormHelper;
use Model\User as UserModel;
use Helper\Url;
use Model\Ad;
use Model\Comment;
use Core\Interfaces\ControllerInterface;
use Model\Rating;

class Catalog extends AbstractController implements ControllerInterface
{

    public function index(): void
    {
        if (!empty($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $this->data['ads'] = (int) Ad::getAds($page);
        $adsCount = Ad::getAdsCount();
        $this->data['pageCount'] = ceil($adsCount / 5);
        $this->data['currentPage'] = $page;
        $this->render('catalog/all');
    }

    public function show(string $slug): void
    {
        $ad = new Ad();

        if ($ad->loadBySlug($slug) === null) {
            $this->render('parts/errors/error404');
            return;
        }
        $this->data['ad'] = $ad;
        $form = new FormHelper('catalog/commentSave', 'POST');
        $form->input([
            'type' => 'hidden',
            'name' => 'adId',
            'value' => $ad->getId()
        ]);
        $form->textArea('comment', 'Add comment', 'comment', 255);
        $form->input([
            'name' => 'submit',
            'type' => 'submit',
            'value' => 'Comment Ad'
        ]);

        $this->data['rated'] = false;
        $rate = new Rating();
        $isRateNull = $rate->loadByUserAndAd($_SESSION['user_id'], $ad->getId());
        if ($isRateNull !== null) {
            $this->data['rated'] = true;
            $this->data['user_rate'] = $rate->getRating();
        }

        $ratings = Rating::getRatingsByAd($ad->getId());
        $sum = 0;
        foreach ($ratings as $rate) {
            $sum += $rate['rating'];
        }

        $this->data['ad_rating'] = 0;
        $this->data['rating_count'] = count($ratings);
        if ($sum > 0) {
            $this->data['ad_rating'] = $sum / $this->data['rating_count'];
        }

        $this->data['comment_form'] = $form->getForm();
        $this->data['title'] = $ad->getTitle();
        $this->data['meta_description'] = $ad->getTitle();

        if ($this->data['ad']) {
            $ad->addView((int)$this->data['ad']->getId());
            $this->data['comments'] = $ad->getAllComments();
            $this->render('catalog/single');
        } else {
            $this->render('parts/errors/error404');
        }
    }

    public function commentSave(): void
    {
        if (empty($_POST['comment'])) Url::redirect('catalog/show/' . $_GET['back']);
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['comment_error'] = 'You need to be logged in to comment';
            Url::redirect('catalog/show/' . $_GET['back']);
        }

        $comment = new Comment();
        $comment->setUserId((int)$_SESSION['user_id']);
        $comment->setAdId((int)$_POST['adId']);
        $comment->setMessage($_POST['comment']);
        $comment->save();

        unset($_SESSION['comment_error']);
        $ad = new Ad();
        $ad->load((int)$_POST['adId']);
        $ad->getSlug();
        Url::redirect('catalog/show/' . $ad->getSlug());
    }

    public function add(): void
    {
        $form = new FormHelper('catalog/create/', 'POST');

        $form->input([
            'name' => 'title',
            'type' => 'text',
            'placeholder' => 'Pavadinimas'
        ]);

        $form->textArea(
            'description',
            'Aprasymas'
        );

        $form->input([
            'name' => 'price',
            'type' => 'number',
            'placeholder' => 'Kaina'
        ]);
        $options = [];

        for ($i = 1970; $i <= date('Y'); $i++) {
            $options[$i] = $i;
        }

        $form->select([
            'name' => 'years',
            'options' => $options,
        ]);

        $form->input([
            'name' => 'image',
            'type' => 'text',
            'placeholder' => 'image'
        ]);

        $form->input([
            'name' => 'vin',
            'type' => 'text',
            'placeholder' => 'VIN code'
        ]);

        $form->input([
            'name' => 'createAd',
            'type' => 'submit',
            'value' => 'Sukurti skelbima'
        ]);
        $this->data['form'] = $form->getForm();
        $this->render('catalog/create');
    }

    public function create(): void
    {
        if (empty($_POST['title'])) {
            die('Neuzpildyti duomenys');
        }
        $slug = Url::slug($_POST['title']);
        while (!Ad::isValueUnic('slug', $slug, 'ads')) {
            $slug = $slug . rand(0, 100);
        }
        $vin = Url::vin($_POST['vin']);
        while (!Ad::isValueUnic('vin', $vin, 'ads')) {
        }
        $ad = new Ad();
        $ad->setTitle($_POST['title']);
        $ad->setDescription($_POST['description']);
        $ad->setManufacturerId(1);
        $ad->setModelId(1);
        $ad->setPrice($_POST['price']);
        $ad->setYear($_POST['years']);
        $ad->setTypeId(1);
        $ad->setUserId($_SESSION['user_id']);
        $ad->setImage($_POST['image']);
        $ad->setActive('1');
        $ad->setSlug($slug);
        $ad->setVin($_POST['vin']);
        $ad->save();

        Url::redirect('');
    }

    public function slugify()
    {
    }

    public function update(): void
    {
        $adId = $_POST['id'];
        $ad = new Ad();
        $ad->load($adId);
        $ad->setTitle($_POST['title']);
        $ad->setDescription($_POST['description']);
        $ad->setManufacturerId(1);
        $ad->setModelId(1);
        $ad->setPrice($_POST['price']);
        $ad->setYear($_POST['years']);
        $ad->setImage($_POST['image']);
        $ad->setTypeId(1);
        $ad->setUserId($_SESSION['user_id']);
        $ad->setVin($_POST['vin']);
        $ad->save();

        Url::redirect('/catalog/show/' . $ad->getSlug());
    }

    public function edit(int $id): void
    {
        if (!isset($_SESSION['user_id'])) {
            Url::redirect('');
        }
        $ad = new Ad();
        $ad->load($id);

        if ($_SESSION['user_id'] != $ad->getUserId()) {
            Url::redirect('');
        }
        $form = new FormHelper('catalog/update', 'POST');
        $form->input([
            'name' => 'title',
            'type' => 'text',
            'placeholder' => 'Pavadinimas',
            'value' => $ad->getTitle()
        ]);
        $form->textArea('description', $ad->getDescription());
        $form->input([
            'name' => 'price',
            'type' => 'text',
            'placeholder' => 'Kaina',
            'value' => $ad->getPrice()
        ]);
        $options = [];

        for ($i = 1970; $i <= date('Y'); $i++) {
            $options[$i] = $i;
        }

        $form->select([
            'name' => 'years',
            'options' => $options,
        ]);

        $form->input([
            'name' => 'id',
            'type' => 'hidden',
            'value' => $ad->getId(),
        ]);

        $form->input([
            'name' => 'image',
            'type' => 'text',
            'placeholder' => 'image_URL',
            'value' => $ad->getImage()
        ]);

        $form->input([
            'name' => 'vin',
            'type' => 'text',
            'placeholder' => 'VIN code',
            'value' => $ad->getVin()
        ]);

        $form->input([
            'type' => 'submit',
            'value' => 'atnaujinti',
            'name' => 'create'
        ]);

        $this->data['form'] = $form->getForm();
        $this->render('catalog/create');
    }

    public function rate()
    {
        $rate = new Rating();
        $rate->loadByUserAndAd($_SESSION['user_id'], $_POST['ad_id']);
        $rate->setUserId((int)$_SESSION['user_id']);
        $rate->setAdId((int)$_POST['ad_id']);
        $rate->setRating((int)$_POST['rate']);
        $rate->save();
        URL::redirect('catalog/show/' . $_GET['back']);
    }
}
