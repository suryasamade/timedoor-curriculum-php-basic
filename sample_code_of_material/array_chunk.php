<?php
$arr = ['bali', "idn", 19, 3.14, [0, 1, 2]];
print_r(array_chunk($arr, 2));
/*
output:
Array
(
    [0] => Array
        (
            [0] => bali
            [1] => idn
        )

    [1] => Array
        (
            [0] => 19
            [1] => 3.14
        )

    [2] => Array
        (
            [0] => Array
                (
                    [0] => 0
                    [1] => 1
                    [2] => 2
                )

        )

)
*/
