<!-- SKENARIO -->
<!-- membuat array multi-dimensi yang berjenis indexed array dan di dalamnya menyimpan array dengan jenis associative array -->
<!-- lalu mengakses indexed array secara acak memanfaatkan built-in function rand() -->
<!-- dan mengakses assoc array dengan menggunakan 'key' dari array -->
<!-- perkenalkan include/require untuk memasukkan code/data dari file lain -->

<?php

include "./c2t2_practice1_data.php";

$randomQuote = $quotes[rand(0, count($quotes) - 1)];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>The Random Quotes</title>
</head>

<body style="width: 50%;">
    <h1>Quote of the day!</h1>
    <p>Press <code>F5</code> or <code>Ctrl + R</code> to randomize the quote.</p>
    <h3><b>"<?= $randomQuote["quote"] ?>"</b> - <?= $randomQuote["author"] ?></h3>
</body>

</html>