<?php

namespace Model;

use Helper\DBHelper;

class User
{
    public static function emailUnic($email)
    {
        $db = new DBHelper();
        $rez = $db->select()->from('user')->where('email', $email)->get();
        return empty($rez);
    }

    public function delete($id)
    {
        $db = new DBHelper();
        $db->delete()->from('user')->where('id', $id)->exec();
    }
}
