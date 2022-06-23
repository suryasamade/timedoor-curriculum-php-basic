<?php
$user = array(
    "id" => 33,
    "first_name" => "Richard",
    "last_name" => "Nixon",
    "position" => "US President"
);

print_r(array_keys($user));
/*
output:
Array
(
    [0] => id
    [1] => first_name
    [2] => last_name
    [3] => position
)
*/
