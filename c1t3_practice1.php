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
$isCashReady            = false;
$anggrekStreetLength    = 0;
$kambojaStreetLength    = 0;
$lotusStreetLength      = 0;

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
        <label for="anggrek">Anggrek Street (meter)</label>
        <input type="number" step="0.1" name="anggrek_street" id="anggrek"><br>
        <label for="kamboja">Kamboja Street (meter)</label>
        <input type="number" step="0.1" name="kamboja_street" id="kamboja"><br>
        <label for="lotus">Lotus Street (meter)</label>
        <input type="number" step="0.1" name="lotus_street" id="lotus"><br>
        <input type="submit" value="Count">
    </form>


    <!-- DI PRACTICE 1 BELUM DIAJARKAN ALTERNATIVE SYNTAX -->
    <?php if ($totalStreetLength > 0) { ?>
        <p><?= "To carry out road repairs with a total length of {$totalStreetLength} meters, Perumahan Graha Sentosa must prepare a total cost of Rp. {$totalCost}." ?></p>
        <!-- conditional untuk menentukan status pelaksanaan proyek -->
        <!-- buat teks berwarna HIJAU ketika kas dievaluasi TRUE, atau teks berwarna MERAH ketika FALSE -->
        <?php if ($isCashReady) { ?>
            <p style="color:green;">Due to the availability of funds, the project will be implemented soon!</p>
        <?php } else { ?>
            <p style="color:red;">However, project implementation will be postponed until funds are available.</p>
        <?php } ?>
    <?php } ?>
</body>

</html>