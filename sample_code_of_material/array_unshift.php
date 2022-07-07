<?php
$fruits = array(
    "strawberry",
    "lemon"
);
$unshift = array_unshift($fruits, "grape", "orange", "banana");
print_r($fruits);
print_r($unshift);
/*
output:
Array
(
    [0] => grape
    [1] => orange
    [2] => banana
    [3] => strawberry
    [4] => lemon
)
5
*/
