<?php
$i = 0;
// while ($i < 10) {
//     echo '$i = ' . $i;
//     echo PHP_EOL;
//     $i++;
// }
/* 
output:
$i = 0
$i = 1
$i = 2
$i = 3
$i = 4
$i = 5
$i = 6
$i = 7
$i = 8
$i = 9
*/
?>
<!-- ALTERNATIVE SYNTAX HERE -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>While Alternative Syntax</title>
</head>

<body>
    <h3>While loop with alternative syntax</h3>
    <?php while ($i < 5) : ?>
        <p>Value of $i is <?= $i ?></p>
        <?php $i++; ?>
        <?php if (!($i < 5)) : ?>
            <p>At the end value of $i will be <?= $i ?></p>
        <?php endif; ?>
    <?php endwhile; ?>
</body>

</html>