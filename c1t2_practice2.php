<!-- COST CALCULATION -->
<!-- CASE -->
<!-- 
    gunakan form sebagai tempat user menentukan nilai, agar dinamis
    ambil dan simpan nilai yang diinputkan user ke dalam variable dengan bantuan form handling (global variables)
-->

<?php

$anggrekStreetLength  = $_GET['anggrek_street'];
$kambojaStreetLength  = $_GET['kamboja_street'];
$lotusStreetLength    = $_GET['lotus_street'];

$anggrekStreetLength  *= 1000;
$lotusStreetLength    /= 100;

$totalStreetLength  = $anggrekStreetLength + $kambojaStreetLength + $lotusStreetLength;
$costMaterial       = $totalStreetLength * 15000;
$workerFee          = ($totalStreetLength / 1000) * 650000;
$totalCost          = $costMaterial + $workerFee;

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
        <label for="anggrek">Anggrek Street (meter)</label>
        <input type="number" step="0.1" name="anggrek_street" id="anggrek"><br>
        <label for="kamboja">Kamboja Street (meter)</label>
        <input type="number" step="0.1" name="kamboja_street" id="kamboja"><br>
        <label for="lotus">Lotus Street (meter)</label>
        <input type="number" step="0.1" name="lotus_street" id="lotus"><br>
        <input type="submit" value="Count">
    </form>

    <p><?= "To carry out road repairs with a total length of {$totalStreetLength} meters, Perumahan Graha Sentosa must prepare a total cost of Rp. {$totalCost}." ?></p>
    <!-- PADA BASE, BERIKAN MEREKA PARAGRAPH MENTAHAN, JADI TUGAS MEREKA UNTUK MEMASUKKAN NILAI VAR KE DALAMNYA -->
    <!-- UNTUK TEMPLATE LAYOUT, PAKAI CDN BOOTSTRAP DARI AWAL, SERTAKAN STRUKTURNYA LANGSUNG PADA BASE PRACTICE JADI BUKAN MEREKA YANG NULIS -->
    <p>To carry out road repairs with a total length of "total_street_length" meters, Perumahan Graha Sentosa must prepare a total cost of Rp. "total_cost".</p>
</body>

</html>