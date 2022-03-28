<?php

// $array[3]['new'] = 'kazkas';

$dog = ['type' => 'dog', 'name' => 'Brisius', 'age' => '13', 'weight' => '10', 'legs' => '2'];
$cat = ['type' => 'cat', 'name' => 'Katinas', 'age' => '2',  'weight' => '3', 'legs' => '2'];
$hamster = ['type' => 'rat', 'name' => 'Fluffy', 'age' => '1', 'weight' => '0.100', 'legs' => '2'];

$pets = [$dog, $cat, $hamster];

foreach ($pets as $pet) {
    $pet['food_amount'] = $pet['weight'] * 0.1;
    $pet['food_amount'] .= "kg.";
    $pet['weight'] .= "kg.";
    $pet['legs'] .= " pairs";
    $pet['age'] .= " years.";
    echo '<pre>';
    foreach ($pet as $key => $value) {
        print_r($key . ': ' . $value . '<br>');
    }
    echo '<hr>';
}
