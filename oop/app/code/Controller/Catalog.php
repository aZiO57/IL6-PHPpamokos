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
            'placeholder' => 'Ad Title'
        ]);
        $form->textArea(
            'description',
            'Describe your car'
        );
        $form->input([
            'name' => 'price',
            'type' => 'number',
            'placeholder' => 'Price'
        ]);

        $options = [];

        for ($i = 1990; $i <= date('Y'); $i++) {
            $options[$i] = $i;
        }

        $form->select([
            'name' => 'years',
            'options' => $options
        ]);

        $form->input([
            'name' => 'createAd',
            'type' => 'submit',
            'value' => 'Create Ad'
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
        $ad->setPrice($_POST['price']);
        $ad->setYear($_POST['years']);
        $ad->setUserId($_SESSION['user_id']);
        $ad->save();

        Url::redirect('');
    }

    public function update($data)
    {
        echo 'Beep Boop I\'m Robot';
    }
}
