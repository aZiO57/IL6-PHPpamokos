<?php include 'parts/header.php';
include_once 'catalog/form.php';
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = 'kontrolinis';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$sql = 'SELECT * FROM forms';
$rez = $conn->query($sql);
$forms = $rez->fetchAll();

echo '<div class="wrapper">';
foreach ($forms as $form) {
    $formObject = new Form($form);
    $formObject->print();
}
echo '</div>';


include 'parts/footer.php'; ?>

