<?php

namespace Helper;

class Validator
{
    public static function checkPassword($pass, $pass2)
    {
        return $pass === $pass2;
    }

    public static function chekEmail($email)
    {
        return strpos($email, '@');
    }
}
