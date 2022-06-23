<?php
$x = 15;
$y = 30;
if ($x > $y)
    echo 'Benar! nilai $x lebih besar daripada nilai $y';
elseif ($x * 2 == $y)
    echo 'Nilai $x*2 sama dengan nilai $y';
else {
    echo 'Nilai $x TIDAK lebih besar daripada nilai $y';
    $x += $y; // assign nilai baru pada variable $x dengan nilai $x+$y
}
// output: Nilai $x*2 sama dengan nilai $y
