<?php
$orca = array(54, "Orcinus orca", "class" => "Mamalia", "speed" => "56 km/jam");
$merge_me = array("Orca whale", "speed" => "100 km/jam", 23);
$merged = array_merge($orca, $merge_me);
print_r($merged);
/*
output:
Array
(
    [0] => 54
    [1] => Orcinus orca
    [class] => Mamalia
    [speed] => 100 km/jam
    [2] => Orca whale
    [3] => 23
)
*/
