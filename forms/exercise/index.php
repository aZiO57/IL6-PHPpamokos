<?php

//pirma uzduotis.
$array = [1, 3, 4, 6, 9, 2, 3, 4, 5, 5, 7, 8, 9, 10, 1, 4, 5, 34, 23, 1, 4, 6, 77, 3, 9];

function calcAvarage($array)
{
    $sum = 0;
    foreach ($array as $x) {
        $sum += $x;
    }
    $avg = $sum / count($array);
    return $avg;
}

$arrayOfSmallerNumbers = [];
$arrayOfBiggerNumbers = [];
$avg = calcAvarage($array);
foreach ($array as $x) {
    if ($x >= $avg) {
        $arrayOfBiggerNumbers[] = $x;
    } else {
        $arrayOfSmallerNumbers[] = $x;
    }
}
//mazesniu skaiciu vidurkis
echo calcAvarage($arrayOfSmallerNumbers);

//didesniu skaiciu vidurkis
echo calcAvarage($arrayOfBiggerNumbers);

count($arrayOfSmallerNumbers) > count($arrayOfBiggerNumbers) ? 'daugiau mazu' : 'dagiau dideliu';

//Antra uzduotis.
//Turime array:

//[1000, 2303, 444, 5554, 9993, 45454, 4343, 65656, 65659, 43434, 92, 23456, 758595, 344433]

//rasti didžiausią lyginį skaičių, sumažinti jį 40% ir atspauzdinti toki pat array, su pakeistu skaičiumi

$array = [1000, 2303, 444, 5554, 9993, 45454, 4343, 65656, 65659, 43434, 92, 23456, 758595, 344433];
$max = 0;
$maxNumberKey = 0;

foreach ($array as $key => $x) {
    if ($x > $max && $x % 2 == 0) {
        $max = $x;
        $maxNumberKey = $key;
    }
}

$newValue = $max * 0.6;
$array[$maxNumberKey] = $newValue;
