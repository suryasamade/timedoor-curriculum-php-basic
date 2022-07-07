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
$flip = array_flip($orca);
print_r($flip);
/*
output:
Array
(
    [54] => id
    [Orca whale] => name
    [Orcinus orca] => scientificName
    [Mamalia] => class
    [3000 - 4000 kg] => mass
    [56 km/jam] => speed
    [5 - 7 m] => length
)
*/
