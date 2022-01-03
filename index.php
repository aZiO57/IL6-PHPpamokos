<?php

$string = 'Hello World';
$productName = 'Rudeniniai Batai rudi';
$productDescription = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years";
$productBrand = 'Nike';
$symbol = '@';
$number = '1';

$null = null;

$productQty = 4;
$holesCount = 32;
$productsManufacturerYear = 2021;

$productPrice = 67.99;
$size = 41.5;
$weigh = 0.5;

$isInStock = true;
$waterProof = true;
$airless = false;
echo "<pre>";
$product = [
    "name" => $productName, 
    "qty" => $productQty, 
    "price" => $productPrice, 
    "water_proof" => $waterProof 
];

$product2 = [
    "name" => 'Vasariniai batai balti', 
    "qty" => 1, 
    "price" => 87.99, 
    "water_proof" => true 
];
$products = [$product, $product2];

// print_r ($products);
// echo $product ['name'];
// // echo $product ['price'];
// // echo '<br>';
// // echo $product2 ['name'];
// // echo $product2 ['price'];
// echo '<br>';
// echo $productDescription;
// echo '<br>';
// echo $productBrand;

// Komentaras one line

/*
Komentaras issamus
per
kelias
eilutes
*/

// = + - / * %;
// $x = 2;
// $y = 8;

// $z = $x % $y;
// echo $z;
// //

// $pvm = 21;

// $priceWithTax = $productPrice * (1+($pvm / 100));

// echo $priceWithTax;
