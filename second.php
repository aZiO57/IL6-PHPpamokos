<?php
ini_set('error_reporting', E_ALL);
ini_set( 'display_errors', 1 );

$string = 'tekstas';
$int = 2;
$float = 2.5;
$boolean = false;
$null = null;
$array = [$string, $int, $boolean];

// $x = 1;
// $y = ['2', $x];
// echo '<pre>';
// var_dump($y);

// $x = '2faAutth';
// $y = 2;

// var_dump($x);
// var_dump($y);
// var_dump($x * $y);

// $x = 2;
// $y = 3;

// if (!$x == 2){
//     echo 'true';
// } elseif($x == 3) {
//     echo 'false';
// }else{
//     echo 'whats left';
// }

// switch($x){
//     case 2:
//         echo '$x = 2';
//         break;
//     case 3:
//         echo '$x = 2';
//         break;
//     default; 
//         echo 'not match';
//         break;
// }

// if(!$variable){
//     $variable = 2;   
// }

// echo $variable;

// $products = [
// [ 
//     'name' => 'Siulai',
//     'price' => 12.4,
//     'special_price' => 9.99,
//     'img' => 'https://siulupinkles.lt/wp-content/uploads/2020/12/laines-du-nord-poema-mezgimo-siulai-kaina.jpg'
// ],
// [
//     'name' => 'Adata',
//     'price' => 1.99,
//     'special_price' => 0.99,
//     'img' => 'data:image/jpeg;base64,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'
// ],
// [
//     'name' => 'virbalai',
//     'price' => 4.99,
//     'img' => 'https://narplioju.lt/images/thumbs/0003624_knitpro-karbonz-virbalai-kojinems-15-cm_550.jpeg'
// ],
// [ 
//     'name' => 'Siulai',
//     'price' => 12.4,
//     'img' => 'https://siulupinkles.lt/wp-content/uploads/2020/12/laines-du-nord-poema-mezgimo-siulai-kaina.jpg'
// ],
// [
//     'name' => 'Adata',
//     'price' => 1.99,
//     'img' => 'data:image/jpeg;base64,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'
// ],
// [
//     'name' => 'virbalai',
//     'price' => 4.99,
//     'img' => 'https://narplioju.lt/images/thumbs/0003624_knitpro-karbonz-virbalai-kojinems-15-cm_550.jpeg'
// ],
// $counter = 1;

// foreach($products as $product) {
//  echo '<img width="70" src=" '. $product ['img'] .'" />';
// echo '<h2>'. $product["name"] . '</h2>';

//         if (isset($product['special_price'])){
//         echo '<h3><del>'.$product ["price"].'</del>'. $product ["special_price"];
//         }else{
//             echo '<h3>'. $product ["price"];
//         };
//         $counter++;
//         if($counter % 3 === 0){
//             echo '<hr>';
//         }
//         // $counter = $counter +1;
//         $counter++;
// }
//     if ($sepcial_price) {
//         echo 'special_price';
//     }
// echo $counter;

// }


// for($y = 0; $y <10;  $y++){
//     for($x = 0; $x <= 10; $x++){
//         if($y % 2==0){
//             echo '#';
//         }else{
//             if($x % 2==0){
//                 echo '#';
//             }else{
//                 echo ' . ';
//             }
//         }
//     }
//     echo '<br>';
// }

// for ($years = 2015; $years < 2022; $years++){
//     for($months = 1; $months <= 12; $months++){
//         if($months == 1 || $months == 3 || $months == 5 || $months == 8 || $months == 10 || $months == 12){
//             $to = 31;
//         }elseif($months == 2){
//             if($years % 4 == 0){
//                 $to = 29;
//             }else{
//                 $to = 28;
//             }
//         }else{
//             $to = 30;
//         }
//         for($day = 1; $day <= $to; $day++){
//             echo $years. ' ' .$months. ' '.$day;
//             echo '<br>';
//         }
//     }
// }
    
$array = [
    ["title" => "Palapinė", "cost" => 103.0],
    ["title" => "Striukė", "cost" => 65.0],
    ["title" => "Meškerės", "cost" => 20.0],
    ["title" => "Kojinės", "cost" => 6.0],
];
foreach($array as $product) {
    echo $product["title"] , " - ";
    echo $product['cost'] * 1.21 . " € ";
    echo '<br>'; 
}


