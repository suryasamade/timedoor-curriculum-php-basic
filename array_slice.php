<?php
$cars = array(
    "Suzuki", 
    "Honda", 
    "Volvo", 
    "GMT", 
    "BMW", 
    "Audi", 
    "Ferarri", 
    "Lamborghini", 
    "Toyota"
);
$superCars = array_slice($cars, 6, -1, true);
print_r($superCars);
/*
output:
Array
(
    [6] => Ferarri
    [7] => Lamborghini
)
*/
