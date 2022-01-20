<?php include 'parts/header.php'; ?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbName = 'auto_minusas';

try {
    //mysql:host=localhost;dbname=shop_lt
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (isset($_POST['CreateUser'])) {
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $pass = $_POST['pass1'];
    $pass_repeat = $_POST['pass2'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    if ($pass !== $pass_repeat) {
        echo 'Passwords do not match';
    } else {
        $sql = 'INSERT INTO users (name, last_name, email, password, phone, city_id) 
            VALUES ("' . $name . '", "' . $last_name . '", "' . $email . '", "' . $pass . '",  "' . $phone . '", "' . $city . '")';

        $conn->query($sql);
        echo 'Registration complete <br>';
        // echo $sql;
    }
}



include 'parts/footer.php'; ?>