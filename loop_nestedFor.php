<?php
for ($m = 1; $m <= 4; $m++) {
    echo "Perkalian $m" . PHP_EOL;
    for ($n = 1; $n <= 3; $n++) {
        echo "$m x $n = " . $m * $n . PHP_EOL;
    }
}
/* 
output:
Perkalian 1
1 x 1 = 1
1 x 2 = 2
1 x 3 = 3
Perkalian 2
2 x 1 = 2
2 x 2 = 4
2 x 3 = 6
Perkalian 3
3 x 1 = 3
3 x 2 = 6
3 x 3 = 9
Perkalian 4
4 x 1 = 4
4 x 2 = 8
4 x 3 = 12
*/