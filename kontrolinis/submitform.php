<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbName = 'kontrolinis';

try {
    $conn = new PDO("mysql:host=$servername;dbname=" . $dbName, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $category = $_POST['category'];

    $sql = 'INSERT INTO forms (name, surname, email, phone, subject, message, category) 
            VALUES ("' . $name . '", "' . $surname . '", "' . $email . '", "' . $phone . '",  "' . $subject . '", "' . $message . '", "' . $category . '")';
    echo $sql;
    $conn->query($sql);

    header('Location: http://localhost/pamokos/kontrolinis/forms.php');
}
