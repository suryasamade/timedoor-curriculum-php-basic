<?php
$user_list = array(
    array(
        "id" => 35,
        "first_name" => "John",
        "last_name" => "Doe"
    ),
    array(
        "id" => 31,
        "first_name" => "Kevin",
        "last_name" => "Dirgantara"
    )
);

print_r(array_column($user_list, "first_name", "id"));
/*
output:
Array
(
    [35] => John
    [31] => Kevin
)
*/
