<?php

namespace Controller;

use Helper\FormHelper;
use Model\User as UserModel;
use Helper\Url;
use Model\Ad;

class Catalog
{
    public function show($id = null)
    {
        if ($id !== null) {
            echo 'Catalog controller ID ' . $id;
        }
    }

    public function all()
    {
        for ($i = 0; $i < 10; $i++) {
            echo '<a href="http://127.0.0.1:8000/index.php/catalog/show/' . $i . '">Read more</a>';
            echo '<br>';
        }
    }

    public function createAd()
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
            'options' => $options
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
        $ad->setManufacturerId('1');
        $ad->setModelId('1');
        $ad->setPrice($_POST['price']);
        $ad->setYear($_POST['years']);
        $ad->setTypeId('1');
        $ad->setUserId($_SESSION['user_id']);
        $ad->save();

        Url::redirect('');
    }

    public function edit($id)
    {
        $ad = new Ad();
        $ad->load($id);
    }
}
