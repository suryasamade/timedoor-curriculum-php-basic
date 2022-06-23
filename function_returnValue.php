<?php

function countTubeVolume($radius, $height)
{
    $tubeVolume = pi() * pow($radius, 2) * $height;
    return $tubeVolume;
}

$radius = 9;
$height = 17;
$tubeVolume = countTubeVolume($radius, $height);

echo "Volume of the tube with radius = $radius cm, and height = $height cm is $tubeVolume cm3.";

/* 
output:
Volume of the tube with radius = 9 cm, and height = 17 cm is 4325.9730839931 cm3.
*/