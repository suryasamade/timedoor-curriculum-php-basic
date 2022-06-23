<?php
$user = array(
    "id" => 33,
    "first_name" => "Richard",
    "last_name" => "Nixon",
    "position" => "US President"
);

print_r(array_values($user));
/*
output:
Array
(
    [0] => 33
    [1] => Richard
    [2] => Nixon
    [3] => US President
)
*/
