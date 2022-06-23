<?php
$cars = array(
    "Suzuki",
    "Honda",
    "Volvo",
    "GMT",
    "BMW",
    "Audi",
    "Ferarri",
    "Lamborghini",
    "Toyota"
);
sort($cars);
print_r($cars);
/*
output:
Array
(
    [0] => Audi
    [1] => BMW
    [2] => Ferarri
    [3] => GMT
    [4] => Honda
    [5] => Lamborghini
    [6] => Suzuki
    [7] => Toyota
    [8] => Volvo
)
*/
