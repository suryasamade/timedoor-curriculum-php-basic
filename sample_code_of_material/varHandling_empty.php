<?php
$arrData = ['', 'exist', false, null, 0, true];
foreach ($arrData as $data) {
    var_dump(empty($data));
}
var_dump(empty($hello));
/* output:
bool(true)
bool(false)
bool(true)
bool(true)
bool(true)
bool(false)
bool(true)
*/
