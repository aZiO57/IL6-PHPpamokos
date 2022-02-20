<?php

namespace Model;

use Helper\DBHelper;
use Core\AbstractModel;

class Ad extends AbstractModel
{

    private $title;

    private $description;

    private $manufacturerId;

    private $modelId;

    private $price;

    private $year;

    private $typeId;

    private $userId;

    private $image;

    private $active;

    private $slug;

    private $vin;

    private $views;

    public function __construct()
    {
        $this->table = 'ads';
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
        return $this->manufacturerId;
    }

    public function setManufacturerId($manufacturerId)
    {
        $this->manufacturerId = $manufacturerId;
    }

    public function getModelId()
    {
        return $this->modelId;
    }

    public function setModelId($modelId)
    {
        $this->modelId = $modelId;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getViews()
    {
        return $this->views;
    }

    public function setViews($views)
    {
        $this->views = $views;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function getTypeId()
    {
        return $this->typeId;
    }

    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function isActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function getVin()
    {
        return $this->vin;
    }

    public function setVin($vin)
    {
        $this->vin = $vin;
    }

    protected function assignData()
    {
        $this->data = [
            'title' => $this->title,
            'description' => $this->description,
            'manufacturer_id' => $this->manufacturerId,
            'model_id' => $this->modelId,
            'price' => $this->price,
            'years' => $this->year,
            'type_id' => $this->typeId,
            'user_id' => $this->userId,
            'image' => $this->image,
            'active' => $this->active,
            'slug' => $this->slug,
            'vin' => $this->vin,
            'views' => $this->views
        ];
    }

    public function load($id)
    {
        $db = new DBHelper();
        $ad = $db->select()->from('ads')->where('id', $id)->getOne();
        if (!empty($ad)) {
            $this->id = $ad['id'];
            $this->title = $ad['title'];
            $this->manufacturerId = $ad['manufacturer_id'];
            $this->description = $ad['description'];
            $this->modelId = $ad['model_id'];
            $this->price = $ad['price'];
            $this->year = $ad['years'];
            $this->typeId = $ad['type_id'];
            $this->userId = $ad['user_id'];
            $this->image = $ad['image'];
            $this->active = $ad['active'];
            $this->slug = $ad['slug'];
            $this->vin = $ad['vin'];
            $this->views = $ad['views'];
        }

        return $this;
    }

    public static function getAllAds()
    {
        $db = new DBHelper();
        $data = $db->select()->from('ads')->where('active', 1)->get();
        $ads = [];
        foreach ($data as $element) {
            $ad = new Ad();
            $ad->load($element['id']);
            $ads[] = $ad;
        }
        return $ads;
    }

    public static function getAds($page)
    {
        $db = new DBHelper();
        $data = $db->select()->from('ads')->where('active', 1)->limit(5)->offset(($page - 1) * 5)->get();
        $ads = [];
        foreach ($data as $element) {
            $ad = new Ad();
            $ad->load($element['id']);
            $ads[] = $ad;
        }
        return $ads;
    }

    public static function getAdsCount()
    {
        $db = new DBHelper();
        $data = $db->select('COUNT(id)')->from('ads')->where('active', 1)->get();
        return $data[0]['COUNT(id)'];
    }

    public static function getRecentAds()
    {
        $db = new DBHelper();
        $data = $db->select()
            ->from('ads')
            ->where('active', 1)
            ->orderBy('id', 'DESC')
            ->limit(5)->get();
        $ads = [];
        foreach ($data as $element) {
            $ad = new Ad();
            $ad->load($element['id']);
            $ads[] = $ad;
        }
        return $ads;
    }

    public static function getPopularAds()
    {
        $db = new DBHelper();
        $data = $db->select()
            ->from('ads')
            ->where('active', 1)
            ->orderBy('views', 'DESC')
            ->limit(5)
            ->get();
        $ads = [];
        foreach ($data as $element) {
            $ad = new Ad();
            $ad->load($element['id']);
            $ads[] = $ad;
        }
        return $ads;
    }

    public function addView($id)
    {
        $views = $this->getViews();
        $this->setViews($views + 1);
        $this->save();
    }

    public function loadBySlug($slug)
    {
        $db = new DBHelper();
        $rez = $db->select()->from($this->table)->where('slug', $slug)->getOne();
        if (!empty($rez)) {
            $this->load($rez['id']);
            return $this;
        } else {
            return false;
        }
    }
}
