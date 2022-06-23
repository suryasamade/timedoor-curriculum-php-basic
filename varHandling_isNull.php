<?php
$arrData = ['bali', "we", 19, 3.14, false, null, [0, 1, 2]];
foreach ($arrData as $data) {
    var_dump(is_null($data));
}
/* output:
bool(false)
bool(false)
bool(false)
bool(false)
bool(false)
bool(true)
bool(false)
*/
