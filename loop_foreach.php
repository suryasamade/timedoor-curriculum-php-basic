<?php
$vocals = array(1 => "a", 2 => "i", 3 => "u", 4 => "e", 5 => "o");
foreach ($vocals as $key => $vocal) {
    echo 'key ' . $key . " = vocal " . $vocal;
    echo PHP_EOL;
}
/* 
output:
key 1 = vocal a
key 2 = vocal i
key 3 = vocal u
key 4 = vocal e
key 5 = vocal o
*/