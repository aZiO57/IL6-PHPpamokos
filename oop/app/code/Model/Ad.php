<?php

declare(strict_types=1);

namespace Model;

use Helper\DBHelper;
use Core\AbstractModel;
use Core\Interfaces\ModelInterface;

class Ad extends AbstractModel implements ModelInterface
{
    protected const TABLE = 'ads';

    private string $title;

    private string $description;

    private int $manufacturerId;

    private int $modelId;

    private float $price;

    private int $year;

    private int $typeId;

    private int $userId;

    private string $image;

    private int $active;

    private string $slug;

    private int $vin;

    private int $views;

    public function __construct($id = null)
    {
        if ($id !== null) {
            $this->load((int)$id);
        }
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getManufacturerId(): int
    {
        return $this->manufacturerId;
    }

    public function setManufacturerId(int $manufacturerId): void
    {
        $this->manufacturerId = $manufacturerId;
    }

    public function getModelId(): int
    {
        return $this->modelId;
    }

    public function setModelId(int $modelId): void
    {
        $this->modelId = $modelId;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getViews(): int
    {
        return $this->views;
    }

    public function setViews(int $views): void
    {
        $this->views = $views;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function setTypeId(int $typeId): void
    {
        $this->typeId = $typeId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function isActive(): int
    {
        return $this->active;
    }

    public function setActive(string $active): void
    {
        $this->active = (int) $active;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    public function getVin(): int
    {
        return $this->vin;
    }

    public function setVin(int $vin): void
    {
        $this->vin = $vin;
    }

    public function assignData(): void
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

    public function load(int $id): object
    {
        $db = new DBHelper();
        $ad = $db->select()->from(self::TABLE)->where('id', (string) $id)->getOne();
        if (!empty($ad)) {
            $this->id = $ad['id'];
            $this->title = $ad['title'];
            $this->manufacturerId = intval($ad['manufacturer_id']);
            $this->description = $ad['description'];
            $this->modelId = intval($ad['model_id']);
            $this->price = (float)$ad['price'];
            $this->year = (int) $ad['years'];
            $this->typeId = intval($ad['type_id']);
            $this->userId = intval($ad['user_id']);
            $this->image = $ad['image'];
            $this->active = (int) $ad['active'];
            $this->slug = $ad['slug'];
            $this->vin = (int) $ad['vin'];
            $this->views = (int)$ad['views'];
        }

        return $this;
    }

    public static function getAllAds(?int $page = null, ?int $limit = null): array
    {
        $db = new DBHelper();
        $db->select()->from(self::TABLE)->where('active', '1');
        if ($limit != null) {
            $db->limit($limit);
        }
        if ($page != null) {
            $db->offset($page);
        }
        $data = $db->get();
        $ads = [];
        foreach ($data as $element) {
            $ad = new Ad();
            $ad->load((int)$element['id']);
            $ads[] = $ad;
        }
        return $ads;
    }

    public static function getAds(int $page): array
    {
        $db = new DBHelper();
        $data = $db->select()->from(self::TABLE)->where('active', '1')->limit(5)->offset(($page - 1) * 5)->get();
        $ads = [];
        foreach ($data as $element) {
            $ad = new Ad();
            $ad->load((int)$element['id']);
            $ads[] = $ad;
        }
        return $ads;
    }

    public static function getAdsCount(): string
    {
        $db = new DBHelper();
        $data = $db->select('COUNT(id)')->from(self::TABLE)->where('active', '1')->get();
        return $data[0]['COUNT(id)'];
    }

    public static function getRecentAds(): array
    {
        $db = new DBHelper();
        $data = $db->select()
            ->from(self::TABLE)
            ->where('active', '1')
            ->orderBy('id', 'DESC')
            ->limit(5)->get();
        $ads = [];
        foreach ($data as $element) {
            $ad = new Ad();
            $ad->load(intval($element['id']));
            $ads[] = $ad;
        }
        return $ads;
    }

    public static function getPopularAds(): array
    {
        $db = new DBHelper();
        $data = $db->select()
            ->from(self::TABLE)
            ->where('active', '1')
            ->orderBy('views', 'DESC')
            ->limit(5)
            ->get();
        $ads = [];
        foreach ($data as $element) {
            $ad = new Ad();
            $ad->load((int)$element['id']);
            $ads[] = $ad;
        }
        return $ads;
    }

    public function addView(int $id): void
    {
        $views = $this->getViews();
        $this->setViews($views + 1);
        $this->save();
    }

    public function loadBySlug(string $slug): ?Ad
    {
        $db = new DBHelper();
        $rez = $db->select()->from(self::TABLE)->where('slug', $slug)->getOne();
        if (!empty($rez)) {
            $this->load((int)$rez['id']);
            return $this;
        } else {
            return null;
        }
    }

    public function getAllComments(): array
    {
        return Comment::getAllComments((int)$this->id);
    }
}
