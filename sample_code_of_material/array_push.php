<?php
$fruits = array(
    "strawberry",
    "lemon"
);
array_push($fruits, "grape", "orange");
print_r($fruits);
/*
output:
Array
(
    [0] => strawberry
    [1] => lemon
    [2] => grape
    [3] => orange
)
*/
