<?php
$orca = array(
    "id" => 54,
    "name" => "Orca whale",
    "scientificName" => "Orcinus orca",
    "class" => "Mamalia",
    "mass" => "3000 - 4000 kg",
    "speed" => "56 km/jam",
    "length" => "5 - 7 m"
);
$rand = array_rand($orca, 2);
print_r($rand);
echo $orca[$rand[0]];
echo PHP_EOL;
echo $orca[$rand[1]];
/*
output:
Array
(
    [0] => class
    [1] => length
)
Mamalia
5 - 7 m
*/
