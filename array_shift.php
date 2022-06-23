<?php
$fruits = array(
    "strawberry",
    "lemon",
    "grape",
    "orange"
);
$shift = array_shift($fruits);
print_r($fruits);
print_r($shift);
/*
output:
Array
(
    [0] => lemon
    [1] => grape
    [2] => orange
)
strawberry
*/
