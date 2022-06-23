<?php
$budiHeight = 182.9;
$raraHeight = 177;
$alexHeight = $raraHeight + 5.9;
$karinHeight = 195;

var_dump($budiHeight <=> $raraHeight); // output: bool(false)
var_dump($budiHeight <=> $alexHeight); // output: bool(true)
var_dump($budiHeight <=> $karinHeight); // output: bool(true)
