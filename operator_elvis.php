<?php
$finalScore = 0;
$descScore = $finalScore ?: "Belum memiliki nilai!";
echo "Nilai: " . $descScore; // output: Belum memiliki nilai!
$finalScore = 75;
$descScore = $finalScore ?: "Belum memiliki nilai!";
echo "Nilai: " . $descScore; // output: 75

$finalScore = 74.9;
$standardScore = 75;
$descScore = $finalScore >= $standardScore ?: "Tidak Lulus";
echo $descScore; // output: Tidak Lulus