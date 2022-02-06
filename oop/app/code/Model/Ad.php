<?php

namespace Model;

use Helper\DBHelper;
use Helper\FormHelper;
use Model\User;

class Ad
{
    private $id;

    private $title;

    private $description;

    private $manufacturer_id;

    private $modelId;

    private $price;

    private $years;

    private $type_id;

    private $user_id;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getManufacturerId()
    {
        return $this->manufacturer_id;
    }

    public function setManufacturerId($manufacturer_id)
    {
        $this->manufacturer_id = $manufacturer_id;
    }

    public function getModelId()
    {
        return $this->model_id;
    }

    public function setModelId($model_id)
    {
        $this->model_id = $model_id;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getYear()
    {
        return $this->years;
    }

    public function setYear($year)
    {
        $this->years = $year;
    }

    public function getTypeId()
    {
        return $this->type_id;
    }

    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function save()
    {
        if (!isset($this->id)) {
            $this->create();
        } else {
            $this->update();
        }
    }

    private function create()
    {
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'manufacturer_id' => 1,
            'model_id' => 1,
            'price' => $this->price,
            'years' => $this->years,
            'type_id' => 1,
            'user_id' => $this->user_id
        ];

        $db = new DBHelper();
        $db->insert('ads', $data)->exec();
    }

    private function update()
    {
        // $data = [
        //     'title' => $this->title,
        //     'description' => $this->description,
        //     'manufacturer_id' => $this->manufacturerId,
        //     'model_id' => $this->modelId,
        //     'price' => $this->price,
        //     'years' => $this->years,
        //     'type_id' => $this->typeId,
        // ];

        // $db = new DBHelper();
        // $db->update('users', $data)->where('id', $this->id)->exec();
    }

    public function load($id)
    {
        // $db = new DBHelper();
        // $data = $db->select()->from('ads')->where('id', $id)->getOne();
        // $this->id = $data['id'];
        // $this->title = $data['title'];
        // $this->description = $data['description'];
        // $this->manufacturerId = $data['manufacturer_id'];
        // $this->modelId = $data['model_id'];
        // $this->price = $data['price'];
        // $this->years = $data['years'];
        // $this->typeId = $data['type_id'];

        // return $this;
    }

    public function delete()
    {
        // $db = new DBHelper();
        // $db->delete()->from('ads')->where('id', $this->id)->exec();
    }

    public static function checkLoginCredentionals($email, $pass)
    {
        $db = new DBHelper();
        $rez = $db
            ->select('id')
            ->from('users')
            ->where('email', $email)
            ->andWhere('password', $pass)
            ->getOne();

        if (isset($rez['id'])) {
            return $rez['id'];
        } else {
            return false;
        }
        //return isset($rez['id']) ? $rez['id'] : false;
    }
}
