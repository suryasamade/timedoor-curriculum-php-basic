<?php
$finalScore = 0;
$descScore = $finalScore ? $finalScore : "Belum memiliki nilai!";
echo "Nilai: " . $descScore; // output: Belum memiliki nilai!
echo "<br>";
$finalScore = 75;
$descScore = $finalScore ? $finalScore : "Belum memiliki nilai!";
echo "Nilai: " . $descScore; // output: 75

$finalScore = 80;
$standardScore = 75;
$descScore = $finalScore >= $standardScore ? "Lulus" : "Tidak Lulus";
echo $descScore; // output: Lulus