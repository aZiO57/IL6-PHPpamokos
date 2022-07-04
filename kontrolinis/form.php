<?php include 'parts/header.php'; ?>
<?php $id = $_GET['id'];

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

$sql = 'SELECT * FROM forms WHERE id = ' . $id;
$rez = $conn->query($sql);
$ads = $rez->fetchAll();

echo '<div class="wrapper">';
foreach ($ads as $ad) {
    echo '<div class="product-box">';
    echo '<div class="title">' . $ad['title'] . '</div>';
    echo '<div class="price">' . $ad['price'] . '</div>';
    echo '<div class="years">' . $ad['years'] . '</div>';
    echo '<div class="manufacturer_id">' . $ad['manufacturer_id'] . '</div>';
    echo '<div class="description">' . $ad['description'] . '</div>';
    echo '</div>';
}
echo '</div>';

include 'parts/footer.php'; ?>