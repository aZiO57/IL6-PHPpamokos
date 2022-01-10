<?php
include 'helper.php';

$id = $_GET['id'];
$product = getProductById($id);
?>

<div class="title">
    <?php echo $product['name']; ?>
</div>
<div class="quantity">
    <?php echo $product['qty']; ?>
</div>
<div class="sku">
    <?php echo $product['sku']; ?>
</div>
<div class="price">
    <?php echo $product['price']; ?>
</div>