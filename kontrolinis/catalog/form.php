<?php


class Form
{
    private $name;

    private $surname;

    private $email;

    private $phone;

    private $subject;

    private $message;

    private $category;

    private $status;

    private $id;

    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->surname = $data['surname'];
        $this->email = $data['email'];
        $this->phone = $data['phone'];
        $this->subject = $data['subject'];
        $this->message = $data['message'];
        $this->category = $data['category'];
        $this->status = $data['status'];
        $this->id = $data['id'];
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function print()
    {
        echo '<div class="product-box">';
        echo '<div class="status"><b>status: </b>' . $this->status . '</div>';
        echo '<div class="name"><b>name: </b>' . $this->name . '</div>';
        echo '<div class="surname"><b>surname: </b>' . $this->surname . '</div>';
        echo '<div class="email"><b>email: </b>' . $this->email . '</div>';
        echo '<div class="phone"><b>phone: </b>' . $this->phone . '</div>';
        echo '<div class="subject"><b>subject: </b>' . $this->subject . '</div>';
        echo '<div class="message"><b>message: </b>' . $this->message . '</div>';
        echo '<div class="category"><b>category: </b>' . $this->category . '</div>';
        echo '<div class="delete"> <a href="http://localhost/pamokos/kontrolinis/delete.php?id=' . $this->id . '">Delete</a></div> ';
        echo '<div class="status"> <a href="http://localhost/pamokos/kontrolinis/statusChange.php?id=' . $this->id . '&status=Read">Mark as read</a></div> ';
        echo '<div class="status"> <a href="http://localhost/pamokos/kontrolinis/statusChange.php?id=' . $this->id . '&status=Replied">Mark as replied</a></div> ';
        echo '</div>';
        echo '<hr>';
    }
}
