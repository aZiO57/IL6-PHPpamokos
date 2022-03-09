<?php

declare(strict_types=1);

namespace Model;

use Core\Interfaces\ModelInterface;
use Helper\DBHelper;

class City
{
    private int $id;

    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function load(string $id): void
    {
        $db = new DBHelper();
        $city = $db->select()->from('cities')->where('id', $id)->getOne();
        $this->id = $city['id'];
        $this->name = $city['city_name'];
    }

    public static function getCities(): array
    {
        $db = new DBHelper();
        $data = $db->select()->from('cities')->get();
        $cities = [];
        foreach ($data as $element) {
            $city = new City();
            $city->load($element['id']);
            $cities[] = $city;
        }
        return $cities;
    }
}
