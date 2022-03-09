<?php

declare(strict_types=1);

namespace Model;

use Core\AbstractModel;
use Core\Interfaces\ModelInterface;
use Helper\DBHelper;

class Comment extends AbstractModel implements ModelInterface
{
    protected const TABLE = 'comment';

    private int $user_id;

    private int $ad_id;

    private int $date;

    private string $message;



    public function load(int $id): object
    {
        $db = new DBHelper();
        $comment = $db->select()->from(self::TABLE)->where('id', (string) $id)->getOne();
        if (!empty($comment)) {
            $this->id = $comment['id'];
            $this->user_id = $comment['user_id'];
            $this->adId = $comment['ad_id'];
            $this->message = $comment['message'];
            $this->date = $comment['date'];
        }
        return $this;
    }

    public function assignData(): void
    {
        $this->data = [
            'user_id' => $this->user_id,
            'ad_id' => $this->ad_id,
            'message' => $this->message,
        ];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }
    public function getUser(): User
    {
        return new User($this->user_id);
    }

    public function getAdid(): int
    {
        return $this->ad_id;
    }

    public function setAdId(int $ad_id): void
    {
        $this->ad_id = $ad_id;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function commentSave(): void
    {
        $comment = new Comment();
        $comment->setUserId($_SESSION['user_id']);
        $comment->setAdId($_POST['ad_id']);
        $comment->setMessage($_POST['comment']);
        $comment->setDate($_POST['date']);
        $this->save();
    }

    public static function getAllComments(string $ad_id): Comment
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
