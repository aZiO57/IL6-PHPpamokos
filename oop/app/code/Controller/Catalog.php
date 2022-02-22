<?php

namespace Controller;

use Core\AbstractController;
use Helper\FormHelper;
use Model\User as UserModel;
use Helper\Url;
use Model\Ad;


class Catalog extends AbstractController
{

    public function index()
    {
        if (!empty($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $this->data['ads'] = Ad::getAds($page);
        $adsCount = Ad::getAdsCount();
        $this->data['pageCount'] = ceil($adsCount / 5);
        $this->data['currentPage'] = $page;
        $this->render('catalog/all');
    }

    public function show($slug)
    {
        $ad = new Ad();
        $this->data['ad'] = $ad->loadBySlug($slug);
        $this->data['title'] = $ad->getTitle();
        $this->data['meta_description'] = $ad->getTitle();
        if ($this->data['ad']) {
            $ad->addView($this->data['ad']->getId());
            $this->render('catalog/single');
        } else {
            $this->render('parts/errors/error404');
        }
    }

    public function add()
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

    public function create()
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

    public function update()
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

    public function edit($id)
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
}
