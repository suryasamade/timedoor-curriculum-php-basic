<?php
$x = true;
$y = 'true';
$z = false;
var_dump($x !== $y); // output: bool(true)
var_dump($x !== $z); // output: bool(true)
var_dump($x !== $x); // output: bool(false)
