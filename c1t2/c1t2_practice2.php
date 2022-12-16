<!-- COST CALCULATION -->
<!-- CASE -->
<!-- 
    gunakan form sebagai tempat user menentukan nilai, agar dinamis
    ambil dan simpan nilai yang diinputkan user ke dalam variable dengan bantuan form handling (global variables)
-->

<?php
    $anggrekStreetLength = $_GET['anggrek_street'];
    $kambojaStreetLength = $_GET['kamboja_street'];
    $lotusStreetLength   = $_GET['lotus_street'];
    
    $costMaterial = 15000;
    $workerFee    = 650000;

    $meterKiloRatio  = 1000;
    $meterCentiRatio = 100;

    $anggrekStreetLength *= $meterKiloRatio;
    $lotusStreetLength   /= $meterCentiRatio;

    $totalStreetLength = $anggrekStreetLength + $kambojaStreetLength + $lotusStreetLength;

    $totalCostMaterial = $totalStreetLength * $costMaterial;

    $totalStreetLengthInKilo = $totalStreetLength / $meterKiloRatio;
    $totalWorkerFee          = $totalStreetLengthInKilo * $workerFee;

    $totalCost = $totalCostMaterial + $totalWorkerFee;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cost Calculation</title>
</head>

<body>
    <h1>Dynamics Calculating Project Cost</h1>

    <form action="" method="GET">
        <!-- PADA BASE PRACTICE, SEDIAKAN LABEL SAJA, INPUT BIARKAN MEREKA YANG BUAT SENDIRI -->
        <label for="anggrek">Anggrek Street (kilometer)</label>
        <input type="number" step="0.1" name="anggrek_street" id="anggrek" required><br>
        <label for="kamboja">Kamboja Street (meter)</label>
        <input type="number" step="0.1" name="kamboja_street" id="kamboja" required><br>
        <label for="lotus">Lotus Street (centimeter)</label>
        <input type="number" step="0.1" name="lotus_street" id="lotus" required><br>
        <input type="submit" value="Count">
    </form>

    <p><?= "To carry out road repairs with a total length of {$totalStreetLength} meters, Perumahan Graha Sentosa must prepare a total cost of Rp. {$totalCost}." ?></p>
</body>

</html>