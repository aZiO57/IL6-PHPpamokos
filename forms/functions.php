<?php
// $_GET
$email=$_POST['user_email'];

function isEmailValid($email)
{
    if(strpos($email, "@")) {
        return true;
    }else{
        return false;
    }
}

if(isEmailValid($email)){
    echo 'email geras';
}else{
    echo 'forgot to add "@" to email';
}
if ($_POST){
    if ($_POST ["veiksmas"] == "+")
        echo $_POST ["number"] + $_POST["number2"];
    if ($_POST ["veiksmas"] == "-")
        echo $_POST ["number"] - $_POST["number2"];  
    if ($_POST ["veiksmas"] == "*")
        echo $_POST ["number"] * $_POST["number2"];  
    if ($_POST ["veiksmas"] == "/")
        echo $_POST ["number"] / $_POST["number2"];      
}

?>
