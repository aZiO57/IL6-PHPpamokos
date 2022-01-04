<?php


// $productArray = [
//     'name' => 'Batai',
//     'price' => '12',
// ];

// $productPrice = 12;
// $discount = 20;

// $productPrice2 = 13;
// $discount2 = 30;

// $finalPrice = getFinalPrice($productPrice, $discount);
// $finalPrice2 = getFinalPrice($productPrice2, $discount2);

// echo '<div class="price">'.$finalPrice. '</div>';
// echo '<div class="price">'.$finalPrice2. '</div>';

// function getFinalPrice($price, $discount){
//     $finalPriceWithoutTaxes = $price * ((100 - $discount)/100);
//     $finalPriceWithTaxes = getPriceWithTax($finalPriceWithoutTaxes);
//     return $finalPriceWithTaxes;
// }

// function getPriceWithTax($price){
//     return $price * 1.21;
// }

// function funkcijosPavadininmas($kinamieji, $kuriuos, $siusim){
//     //code
//     return null;
// }


// $userEmail ='deividas123@gmail.com';
// $userEmail ='deividask123@gmail.com ';
// $userEmail ='Deividask123@gmail.com';


// $email = %userEmail
// $email = 'Naujas@emailas.lt'
// function clearEmail($email,){
//     $email = strtolower($email);
//     return trim($email);
// }
// echo clearEmail('Naujas@emailas.lt');
// echo "\n";
// echo clearEmail('Naujassdsdsd@emailas.lt');
// echo "\n";
// echo clearEmail('Naujas@emailas2222.lt');
// echo "\n";
// echo clearEmail('Naujasgmail.lt');
// echo "\n";
// echo clearEmail($userEmail);

// function clearEmail($email){
//     $emailLowercases=strtolower($email);
//     return trim($emailLowercases);
//     }

// function isEmailValid($email){
//     if(strpos($email, '@')){  
//         return true;
//         echo 'ok';
//     }else{
//         return false;
//     }
// }
//     if(isEmailValid($userEmail)){
//     echo clearEmail($userEmail);
// }else{
//     echo 'Emailas nevalidus';
// }

$name = 'Deividas';
$surname = 'Kravcenko';

// nick turi gautis = deikra;
echo getNickName($name, $surname);

function getNickName($name, $surname){
    $firstNameLetters = substr($name, offset: 0, length: 3);
    $firstSurNameLetters = substr($surname, offset: 0, length: 3);
    return strtolower(substr($name, 0, 3) . substr($surname, 0,3) . rand(1,100));
}
