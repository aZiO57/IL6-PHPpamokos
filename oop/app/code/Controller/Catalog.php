<?php

namespace Controller;

use Core\AbstractController;
use Helper\FormHelper;
use Model\User as UserModel;
use Helper\Url;
use Model\Ad;

class Catalog extends AbstractController
{
    public function show($id)
    {
        $ad = new Ad();
        $this->data['ad'] = $ad->load($id);
        $this->render('catalog/single');
    }

    public function all()
    {
        $this->data['ads'] = Ad::getAllAds();
        $this->render('catalog/all');
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
            'name' => 'createAd',
            'type' => 'submit',
            'value' => 'Sukurti skelbima'
        ]);

        echo $form->getForm();
    }

    public function create()
    {
        if (empty($_POST['title'])) {
            die('Neuzpildyti duomenys');
        }
        $ad = new Ad();
        $ad->setTitle($_POST['title']);
        $ad->setDescription($_POST['description']);
        $ad->setManufacturerId(1);
        $ad->setModelId(1);
        $ad->setPrice($_POST['price']);
        $ad->setYear($_POST['year']);
        $ad->setTypeId(1);
        $ad->setUserId($_SESSION['user_id']);
        $ad->setImage($_POST['image']);
        $ad->setActive('1');
        $ad->save();

        Url::redirect('');
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
        $ad->save();
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
            'name' => 'image',
            'type' => 'text',
            'placeholder' => 'image_URL',
            'value' => $ad->getImage()
        ]);

        $form->input([
            'type' => 'submit',
            'value' => 'sukurti',
            'name' => 'create'
        ]);

        $this->data['form'] = $form->getForm();
        $this->render('catalog/create');
    }
}
