<?php

$array = [1, 12, 23, 94, 83, 3, 34, 6, 9, 5, 34, 56, 94, 45, 6, 7, 45, 43, 92, 31];

$arrayEven = [];
$arrayOdd = [];
$maxEven = 0;
$maxOdd = 0;

foreach ($array as $x) {
    if ($x % 2 == 0) {
        $arrayEven[] = $x;
        if ($x > $maxEven) {
            $maxEven = $x;
        } else {
            $arrayOdd[] = $x;
            if ($x > $maxOdd) {
                $maxOdd = $x;
            }
        }
    }
}
function calcAverage($array)
{
    $sum = 0;
    foreach ($array as $x) {
        $sum = $sum + $x;
    }
    return $sum / count($array);
}
echo calcAverage($arrayEven);
echo '<pre>';
echo calcAverage($arrayOdd);
echo $maxEven;
echo $maxOdd;
