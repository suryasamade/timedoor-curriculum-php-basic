<?php
$status;
var_dump($status ?? "False"); // output: string(5) "False"
$status = null;
var_dump($status ?? "False"); // output: string(5) "False"
$isRain = false;
var_dump($isRain ?? "False"); // output: bool(false)
$cars = [];
var_dump($cars ?? $cars + ["Ferari"]);
// output:
// array(0) {
// }
var_dump($status ?? $cars + ["Ferari"]);
// output:
// array(1) {
//     [0] =>
//     string(6) "Ferari"
//   }
