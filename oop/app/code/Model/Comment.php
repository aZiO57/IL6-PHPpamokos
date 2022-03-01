<?php

namespace Model;

use Core\AbstractModel;
use Core\Interfaces\ModelInterface;
use Helper\DBHelper;

class Comment extends AbstractModel implements ModelInterface
{
    private $userId;

    private $adId;

    private $date;

    private $message;

    private $active;


    public function load($id)
    {
        $db = new DBHelper();
        $comment = $db->select()->from(self::TABLE)->where('id', $id)->getOne();
        if (!empty($comment)) {
            $this->id = $comment['id'];
            $this->userId = $comment['user_id'];
            $this->adId = $comment['ad_id'];
            $this->message = $comment['message'];
            $this->date = $comment['date'];
            $this->active = $comment['active'];
        }

        return $this;
    }

    public function assignData()
    {
        $this->data = [
            'id' => $this->id,
            'user_id' => $this->userId,
            'ad_id' => $this->adId,
            'date' => $this->date,
            'mesage' => $this->message,
            'active' => $this->active,
        ];
    }


    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    public function getAdId()
    {
        return $this->adId;
    }

    public function setAdId($adId): void
    {
        $this->adId = $adId;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message): void
    {
        $this->message = $message;
    }

    public function isActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function commentSave()
    {
        $comment = $this->commentSave();
        $this->save();
    }
}
