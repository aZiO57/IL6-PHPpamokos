<?php

namespace Model;

use Core\AbstractModel;
use Core\Interfaces\ModelInterface;
use Helper\DBHelper;

class Comment extends AbstractModel implements ModelInterface
{
    protected const TABLE = 'comment';

    private $user_id;

    private $ad_id;

    private $date;

    private $message;



    public function load($id)
    {
        $db = new DBHelper();
        $comment = $db->select()->from(self::TABLE)->where('id', $id)->getOne();
        if (!empty($comment)) {
            $this->id = $comment['id'];
            $this->user_id = $comment['user_id'];
            $this->adId = $comment['ad_id'];
            $this->message = $comment['message'];
            $this->date = $comment['date'];
        }

        return $this;
    }

    public function assignData()
    {
        $this->data = [
            'user_id' => $this->user_id,
            'ad_id' => $this->ad_id,
            'message' => $this->message,
            // 'date' => $this->date
        ];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }
    public function getUser()
    {
        return new User($this->user_id);
    }

    public function getAdid()
    {
        return $this->ad_id;
    }

    public function setAdId($ad_id): void
    {
        $this->ad_id = $ad_id;
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

    public function commentSave()
    {
        $comment = new Comment();
        $comment->setUserId($_SESSION['user_id']);
        $comment->setAdId($_POST['ad_id']);
        $comment->setMessage($_POST['comment']);
        $comment->setDate($_POST['date']);
        $this->save();
    }

    public static function getAllComments($ad_id)
    {
        $db = new DBHelper();
        $data = $db->select()->from(self::TABLE)->where('ad_id', $ad_id)->get();
        $comment = [];
        foreach ($data as $element) {
            $comment = new Comment();
            $comment->load($element['id']);
            $comments[] = $comment;
        }
        return $comments; {
        }
    }
}
