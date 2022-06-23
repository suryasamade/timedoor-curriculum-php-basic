<?php
$arrData = ['', 'exist', false, null, 0, true];
foreach ($arrData as $data) {
    var_dump(isset($data));
}
var_dump(isset($hello));
/* output:
bool(true)
bool(true)
bool(true)
bool(false)
bool(true)
bool(true)
bool(false)
*/
