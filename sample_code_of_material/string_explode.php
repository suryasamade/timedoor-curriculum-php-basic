<?php
// $text = "satu|dua|tiga|empat|lima";
// $textArr = explode("|", $text);
// print_r($textArr);
/* output:
Array
(
    [0] => satu
    [1] => dua
    [2] => tiga
    [3] => empat
    [4] => lima
)
*/
?>
<?php
$text = "foo:*:1023:1000::/home/foo:/bin/sh";
$textArr = explode(":", $text, 3);
print_r($textArr);
/* output:
Array
(
    [0] => foo
    [1] => *
    [2] => 1023:1000::/home/foo:/bin/sh
)
*/
?>