<?php
$x = 26;
if ($x % 2 == 0) {
    echo "$x adalah angka genap!" . PHP_EOL;
    if ($x > 20) {
        echo "Nilai $x lebih dari 20.";
    } else {
        echo "Nilai $x kurang dari 20.";
    }
} else {
    echo "$x adalah angka ganjil!" . PHP_EOL;
    if ($x > 20) {
        echo "Nilai $x lebih dari 20.";
    } else {
        echo "Nilai $x kurang dari 20.";
    }
}
// output:
// 26 adalah angka genap!
// Nilai 26 lebih dari 20.
