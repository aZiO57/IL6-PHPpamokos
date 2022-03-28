<?php

//[1, 12, 23, 94, 83, 3, 34, 6, 9, 5, 34, 56, 94, 45, 6, 7, 45, 43, 92, 3,4,93,4,5,87,45,67,89,23,41,43,75]
//Rasti skaicius mazesnius uz vidurki bet didesnius uz vidurkio puse. suskaiciuoti, kiek tokiu skaiciu yra..


// $array = array(1, 12, 23, 94, 83, 3, 34, 6, 9, 5, 34, 56, 94, 45, 6, 7, 45, 43, 92, 3, 4, 93, 4, 5, 87, 45, 67, 89, 23, 41, 43, 75);

// $average = array_sum($array) / count($array);

// echo $average;

$array = [1, 12, 23, 94, 83, 3, 34, 6, 9, 5, 34, 56, 94, 45, 6, 7, 45, 43, 92, 3, 4, 93, 4, 5, 87, 45, 67, 89, 23, 41, 43, 75];

$sum = 0;
$i = 0;

foreach ($array as $x) {
    $sum += $x;
}

$average = ($sum / count($array));

foreach ($array as $x) {
    if ($x < $average && $x > ($average / 2)) {
        // $i = $i + 1;
        $i++;
    }
}

echo $i;
