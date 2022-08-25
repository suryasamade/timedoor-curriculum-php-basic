<?php
// for ($i = 1; $i <= 10; $i++) {
//     echo 'Nilai $i = ' . $i;
//     echo PHP_EOL;
// }
/* 
output:
Nilai $i = 1
Nilai $i = 2
Nilai $i = 3
Nilai $i = 4
Nilai $i = 5
Nilai $i = 6
Nilai $i = 7
Nilai $i = 8
Nilai $i = 9
Nilai $i = 10
*/
$studentScores = [
    [80, 91, 79],
    [86, 75, 88]
];
// echo $studentScores[0][2];
for ($i = 0; $i < count($studentScores); $i++) {
    // $studentIndex = $i+1;
    for ($j = 0; $j < count($studentScores[$i]); $j++) {
        // echo $studentScores[$i][$j];
        echo "Student score row-$i col-$j is " . $studentScores[$i][$j] . "<br>";
        // echo '$i='.$i.' & '.'$j='.$j."\n";
    }
}
?>
<!-- ALTERNATIVE SYNTAX HERE -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>For Alternative Syntax</title>
</head>

<body>
    <h3>For loop with alternative syntax</h3>
    <?php for ($i = 0; $i < 5; $i++) : ?>
        <p>Value of $i is <?= $i ?></p>
    <?php endfor; ?>
</body>

</html>