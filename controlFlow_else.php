<?php
$x = 15;
$y = 30;
if ($x > $y)
    echo 'Benar! nilai $x lebih besar daripada nilai $y';
else {
    echo 'Nilai $x TIDAK lebih besar daripada nilai $y'.PHP_EOL;
    $x += $y; // assign nilai baru pada variable $x dengan nilai $x+$y
    echo $x;
}
/* 
output: 
Nilai $x TIDAK lebih besar daripada nilai $y
45
*/
