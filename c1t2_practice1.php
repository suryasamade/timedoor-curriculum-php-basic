<!-- COST CALCULATION -->
<!-- CASE -->
<!-- 
    terdapat tiga proyek perbaikan jalan yang sedang di lakukan di perumahan 'Graha Sentosa'
    jalan pertama bernama 'Jalan Anggrek' memiliki panjang 0.8 kilometer
    jalan kedua bernama 'Jalan Kamboja' memiliki panjang 500 meter
    dan jalan bernama ketiga 'Jalan Lotus' sepanjang 2500 centimeter
    untuk memperbaiki 1 meter jalan, dibutuhkan biaya untuk material sebesar Rp. 15.000,
    dan setiap 1 kilometer upah tukang dibayar sebesar Rp. 650.000 
    berapa biaya yang harus disiapkan untuk memperbaiki tiga proyek perbaikan jalan tersebut?
-->

<?php
$appName        = "Cost Calculation";
$appTitle       = "Calculating Project Cost";

// [comment di bawah masukkan sebagai butir soal]
// variable panjang jalan
$anggrekStreetLength  = 0.8;
$kambojaStreetLength  = 500;
$lotusStreetLength    = 2500;

// [comment di bawah masukkan sebagai butir soal]
// konversi panjang jalan ke satuan meter menggunakan assignment operator
$anggrekStreetLength  *= 1000;
$lotusStreetLength    /= 100;

// [comment di bawah masukkan sebagai butir soal]
// formulasi atau rumus untuk menghitung cost
// menghitung panjang total seluruh jalan
$totalStreetLength  = $anggrekStreetLength + $kambojaStreetLength + $lotusStreetLength;
// menghitung biaya material
$costMaterial       = $totalStreetLength * 15000;
// menghitung biaya tukang
$workerFee          = ($totalStreetLength / 1000) * 650000;
// menghitung keseluruhan biaya
$totalCost          = $costMaterial + $workerFee;

// [comment di bawah masukkan sebagai butir soal]
// melakukan concate dengan single quote string
// [explain on material] string menggunakan single quote
$costDescription    = 'Maka untuk melakukan perbaikan jalan dengan total panjang ' . $totalStreetLength . ' meter, Perumahan Graha Sentosa harus menyiapkan total biaya sebesar Rp. ' . $totalCost . '.';
// [explain on material] string menggunakan double quote
// echo "Maka untuk melakukan perbaikan jalan sepanjang $totalStreetLength meter, Perumahan X harus menyiapkan total biaya sebesar Rp. $totalBiaya.";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $appName ?></title>
</head>

<body>
    <h1><?= $appTitle ?></h1>
    <p><?= $costDescription ?></p>
</body>

</html>