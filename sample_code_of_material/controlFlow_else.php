<?php
$isRaincoatReady = true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <h3>Decision Based On Riding Readiness</h3>
    <?php if ($isRaincoatReady) : ?>
        <p style="color: <?= $fontColor ?>;">Continue the trip by using raincoat!</p>
    <?php else : ?>
        <p style="color: <?= $fontColor ?>;">Stop and take shelter.</p>
    <?php endif ?>
</body>

</html>
<?php
$isRaincoatReady = true;

// if ($isRaincoatReady) {
//     echo "Continue the trip by using raincoat!";
// } else {
//     echo "Stop and take shelter.";
// };
// $x = 15;
// $y = 30;
// if ($x > $y)
// echo 'Benar! nilai $x lebih besar daripada nilai $y';
// else {
// echo 'Nilai $x TIDAK lebih besar daripada nilai $y'.PHP_EOL;
// $x += $y; // assign nilai baru pada variable $x dengan nilai $x+$y
// echo $x;
// }
/*
output:
Nilai $x TIDAK lebih besar daripada nilai $y
45
*/