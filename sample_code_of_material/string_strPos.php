<?php
$teks = "Belajar tidak pernah mengenal usia, kapan pun proses belajar bisa dilakukan.";
$target = "tidak";
$posIndeks = strpos($teks, $target);
var_dump($posIndeks); // output: int(8)
