<?php

$email = $_POST['email'];

function clearEmail($email)
{
    $email = trim($email);
    $email = strtolower($email);
    return $email;
}
function isEmailValid($email)
{
    if (strpos($email, "@")) {
        return true;
    } else {
        return false;
    }
}
$email = clearEmail($email);
if (isEmailValid($email)) {
    $file = fopen('subscribers.csv', 'a'); {
        fputcsv($file, [$email]);
    }
    fclose($file);
}
