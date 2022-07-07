<?php
$arrData = ['bali', "we", 19, 3.14, false, null, [0, 1, 2]];
foreach ($arrData as $data) {
    echo (gettype($data)) . PHP_EOL;
}
/* output:
string
string
integer
double
boolean
NULL
array
*/