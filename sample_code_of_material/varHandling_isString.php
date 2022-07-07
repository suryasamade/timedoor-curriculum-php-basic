<?php
$arrData = ['bali', "we", 19, 3.14, false, null, [0, 1, 2]];
foreach ($arrData as $data) {
    var_dump(is_string($data));
}
/* output:
bool(true)
bool(true)
bool(false)
bool(false)
bool(false)
bool(false)
bool(false)
*/
