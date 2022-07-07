<?php
$arrData = ['bali', "we", 19, 3.14, false, null, [0, 1, 2]];
var_dump($arrData);
/* output:
array(7) {
  [0] =>
  string(4) "bali"
  [1] =>
  string(2) "we"
  [2] =>
  int(19)
  [3] =>
  double(3.14)
  [4] =>
  bool(false)
  [5] =>
  NULL
  [6] =>
  array(3) {
    [0] =>
    int(0)
    [1] =>
    int(1)
    [2] =>
    int(2)
  }
}
*/
