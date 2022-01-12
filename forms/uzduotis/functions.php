<?php

$email = $_POST['email'];
$password = $_POST['password'];
$repeatpassword =$_POST['repeatpassword'];
$name = $_POST['name'];
$surname = $_POST['surname'];

function isEmailValid($email)
{
    if(strpos($email, "@")) {
        return true;
    }else{
        return false;
    }
}

if(isEmailValid($email)){
    echo 'Registed correctly';
}else{
    echo 'forgot to add "@" to email';
}
function ispasswordcorrect($repeatpassword, $password)
{
    if($repeatpassword === $password) {
        return true;
    }else{
        return false;
    }
}

if(ispasswordcorrect($repeatpassword,$password))
{
    echo "<br>passwords match";}
    else{
    echo "<br>passwords do NOT!!! match ";
}

?>