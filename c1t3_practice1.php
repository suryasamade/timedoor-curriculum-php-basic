<!-- COST CALCULATION: WITH CONDITIONAL -->
<!-- CASE -->
<!--
    1. hilangkan warning dengan evaluasi jika input undefined, gunakan nilai default 
    2. jika dana/kas dievaluasi sebagai true, maka proyek akan dilaksanakan
    3. tapi jika dana/kas dievaluasi sebagai false, maka pelaksanaan proyek perbaikan jalan akan ditunda sementara
-->

<?php
    // nilai default
    // VARIABLE $isCashReady DATANGNYA DARI MANA? KOK TIBA-TIBA ADA? APAKAH ADA DI BUTIR SOAL PRACTICE?
    $isCashReady = false;

    $anggrekStreetLength = 0;
    $kambojaStreetLength = 0;
    $lotusStreetLength   = 0;

    $costMaterial = 15000;
    $workerFee    = 650000;

    $meterKiloRatio  = 1000;
    $meterCentiRatio = 100;
    // input yang tidak di-set ketika di-submit, akan true saat evaluasi isset() 
    // menyebabkan empty string disimpan ke dalam variable (jika pengecekan empty() dihapus)

    // BERIKAN BATASAN AGAR HANYA MENGGUNAKAN MATERI YANG DIAJARKAN SAJA DULU

    if (isset($_GET['anggrek_street'])) {
        if (empty($_GET['anggrek_street'])) {
        } else {
            $anggrekStreetLength = $_GET['anggrek_street'];
        }
    }

    if (isset($_GET['kamboja_street'])) {
        if (empty($_GET['kamboja_street'])) {
        } else {
            $kambojaStreetLength = $_GET['kamboja_street'];
        }
    }

    if (isset($_GET['lotus_street'])) {
        if (empty($_GET['lotus_street'])) {
        } else {
            $lotusStreetLength = $_GET['lotus_street'];
        }
    }

    $anggrekStreetLength *= $meterKiloRatio;
    $lotusStreetLength   /= $meterCentiRatio;

    $totalStreetLength = $anggrekStreetLength + $kambojaStreetLength + $lotusStreetLength;

    $totalCostMaterial = $totalStreetLength * $costMaterial;
    
    $totalStreetLengthInKilo = $totalStreetLength / $meterKiloRatio;
    $totalWorkerFee          = $totalStreetLengthInKilo * $workerFee;
    
    $totalCost = $costMaterial + $workerFee;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cost Calculation</title>
</head>

<body>
    <h1>Dynamics Calculating Project Cost</h1>

    <form action="" method="GET">
        <label for="anggrek">Anggrek Street (meter)</label>
        <input type="number" step="0.1" name="anggrek_street" id="anggrek" required><br>
        <label for="kamboja">Kamboja Street (meter)</label>
        <input type="number" step="0.1" name="kamboja_street" id="kamboja" required><br>
        <label for="lotus">Lotus Street (meter)</label>
        <input type="number" step="0.1" name="lotus_street" id="lotus" required><br>
        <input type="submit" value="Count">
    </form>


    <?php if ($totalStreetLength > 0) { ?>
        <p><?= "To carry out road repairs with a total length of {$totalStreetLength} meters, Perumahan Graha Sentosa must prepare a total cost of Rp. {$totalCost}." ?></p>
        <!-- conditional untuk menentukan status pelaksanaan proyek -->
        <!-- buat teks berwarna HIJAU ketika kas dievaluasi TRUE, atau teks berwarna MERAH ketika FALSE -->
        <?php if ($isCashReady) { ?>
            <p style="color:green;">The project will be implemented soon!</p>
        <?php } else { ?>
            <p style="color:red;">The project implementation will be postponed until funds are available.</p>
        <?php } ?>
    <?php } ?>
</body>

</html>