<?php
$orca = array(
    54,
    "Orca whale",
    "Orcinus orca",
    "class" => "Mamalia",
    "3000 - 4000 kg",
    "speed" => "56 km/jam",
    "5 - 7 m"
);
$reverse = array_reverse($orca, true);
print_r($reverse);
/*
output:
Array
(
    [4] => 5 - 7 m
    [speed] => 56 km/jam
    [3] => 3000 - 4000 kg
    [class] => Mamalia
    [2] => Orcinus orca
    [1] => Orca whale
    [0] => 54
)
*/
