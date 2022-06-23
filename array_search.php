<?php
$orca = array(54, "class" => "Mamalia", "speed" => "56 km/jam", "5 - 7 m", 
    "Orcinus orca", "4000", "Orcinus orca", "Orca whale", 4000);
print_r($orca);
echo array_search("Orcinus orca", $orca);
echo PHP_EOL;
echo array_search(4000, $orca, true);
/*
output:
Array
(
    [0] => 54
    [class] => Mamalia
    [speed] => 56 km/jam
    [1] => 5 - 7 m
    [2] => Orcinus orca
    [3] => 4000
    [4] => Orcinus orca
    [5] => Orca whale
    [6] => 4000
)
2
6
*/
