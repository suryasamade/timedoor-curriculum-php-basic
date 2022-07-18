<!-- COST CALCULATION -->
<!-- SKENARIO -->
<!-- 
    gunakan form sebagai tempat user menentukan nilai, agar dinamis
    ambil dan simpan nilai yang diinputkan user ke dalam variable dengan bantuan form handling (global variables)
-->

<?php
$appName        = "Cost Calculation";
$appTitle       = "Dynamics Calculating Project Cost";

$anggrekStreetLength  = $_GET['anggrek_street'];
$kambojaStreetLength  = $_GET['kamboja_street'];
$lotusStreetLength    = $_GET['lotus_street'];

$anggrekStreetLength  *= 1000;
$lotusStreetLength    /= 100;

$totalStreetLength  = $anggrekStreetLength + $kambojaStreetLength + $lotusStreetLength;
$costMaterial       = $totalStreetLength * 15000;
$workerFee          = ($totalStreetLength / 1000) * 650000;
$totalCost          = $costMaterial + $workerFee;

$costDescription    = 'Maka untuk melakukan perbaikan jalan dengan total panjang ' . $totalStreetLength . ' meter, Perumahan Graha Sentosa harus menyiapkan total biaya sebesar Rp. ' . $totalCost . '.';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $appName ?></title>
</head>

<body>
    <h1><?= $appTitle ?></h1>

    <form action="" method="GET">
        <label for="anggrek">Anggrek</label>
        <input type="number" step="0.1" name="anggrek_street" id="anggrek"><br>
        <label for="kamboja">Kamboja</label>
        <input type="number" step="0.1" name="kamboja_street" id="kamboja"><br>
        <label for="lotus">Lotus</label>
        <input type="number" step="0.1" name="lotus_street" id="lotus"><br>
        <input type="submit" value="Count">
    </form>

    <p><?= $costDescription ?></p>
</body>

</html>