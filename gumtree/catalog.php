<?php include 'parts/header.php'; ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = 'auto_minusas';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$sql = 'SELECT * FROM ads';
$rez = $conn->query($sql);
$ads = $rez->fetchAll();

echo '<div class="wrapper">';
foreach ($ads as $ad) {
    echo '<div class="product-box">';
    echo '<div class="title">' . $ad['title'] . '</div>';
    echo '<div class="price">' . $ad['price'] . '</div>';
    echo '<div class="years">' . $ad['years'] . '</div>';
    echo '<a href="http://localhost/Pamokos/gumtree/ad.php?id=' . $ad['id'] . '">More</a>';
    echo '</div>';
}
echo '</div>';


include 'parts/footer.php'; ?>

