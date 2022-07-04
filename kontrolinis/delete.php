<?php $id = $_GET['id'];

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

if (isset($_GET['id'])) {
    $sql = 'DELETE FROM forms WHERE id=' . $_GET['id'];

    $conn->query($sql);
    header('Location: http://localhost/pamokos/kontrolinis/forms.php');
}
