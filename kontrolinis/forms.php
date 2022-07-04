<?php include 'parts/header.php'; ?>
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
    echo '<div class="product-box">';
    echo '<div class="status"><b>status: </b>' . $form['status'] . '</div>';
    echo '<div class="name"><b>name: </b>' . $form['name'] . '</div>';
    echo '<div class="surname"><b>surname: </b>' . $form['surname'] . '</div>';
    echo '<div class="email"><b>email: </b>' . $form['email'] . '</div>';
    echo '<div class="phone"><b>phone: </b>' . $form['phone'] . '</div>';
    echo '<div class="subject"><b>subject: </b>' . $form['subject'] . '</div>';
    echo '<div class="message"><b>message: </b>' . $form['message'] . '</div>';
    echo '<div class="category"><b>category: </b>' . $form['category'] . '</div>';
    echo '<div class="delete"> <a href="http://localhost/pamokos/kontrolinis/delete.php?id=' . $form['id'] . '">Delete</a></div> ';
    echo '<div class="status"> <a href="http://localhost/pamokos/kontrolinis/statusChange.php?id=' . $form['id'] . '&status=Read">Mark as read</a></div> ';
    echo '<div class="status"> <a href="http://localhost/pamokos/kontrolinis/statusChange.php?id=' . $form['id'] . '&status=Replied">Mark as replied</a></div> ';
    echo '</div>';
    echo '<hr>';
}
echo '</div>';


include 'parts/footer.php'; ?>

