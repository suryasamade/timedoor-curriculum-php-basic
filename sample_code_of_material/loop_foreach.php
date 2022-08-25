<?php
// $vocals = array(1 => "a", 2 => "i", 3 => "u", 4 => "e", 5 => "o");
// foreach ($vocals as $key => $vocal) {
//     echo 'key ' . $key . " = vocal " . $vocal;
//     echo PHP_EOL;
// }
/* 
output:
key 1 = vocal a
key 2 = vocal i
key 3 = vocal u
key 4 = vocal e
key 5 = vocal o
*/


// $studentScores = [80,91,79,86,75,88];

// foreach ($studentScores as $score) {
//   echo "Student score is {$score} <br>";
// }


$davidIdentity = [
    "firstName" => "David",
    "lastName" => "Antonius",
    "address" => "Mawar Residence, No. 3",
    "bodyHeight" => 175,
    "bodyWeight" => 75
];

// echo "David Identity:\n";
// foreach ($davidIdentity as $key => $value) {
//     echo "{$key} = {$value} \n";
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Foreach Alternative Syntax</title>
</head>

<body>
    <h3>Foreach loop with alternative syntax</h3>
    <h4>David Identity</h4>
    <?php foreach ($davidIdentity as $key => $value) : ?>
        <p>His <?= $key ?> is <?= $value ?></p>
    <?php endforeach; ?>
</body>

</html>