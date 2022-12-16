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
    // [comment di bawah masukkan sebagai butir soal]
    // variable panjang jalan
    $anggrekStreetLength = 0.8;
    $kambojaStreetLength = 500;
    $lotusStreetLength   = 2500;

    $costMaterial = 15000;
    $workerFee    = 650000;

    // [comment di bawah masukkan sebagai butir soal]
    // konversi panjang jalan ke satuan meter menggunakan assignment operator

    // JADIKAN VARIABLE NILAI 1000 ITU APA, 100 ITU APA, AGAR JELAS,TIDAK MEMBINGUNGKAN
    $meterKiloRatio  = 1000;
    $meterCentiRatio = 100;

    $anggrekStreetLength *= $meterKiloRatio;
    $lotusStreetLength   /= $meterCentiRatio;

    // [comment di bawah masukkan sebagai butir soal]
    // formulasi atau rumus untuk menghitung cost
    // menghitung panjang total seluruh jalan
    $totalStreetLength  = $anggrekStreetLength + $kambojaStreetLength + $lotusStreetLength;

    // menghitung biaya material
    $totalCostMaterial = $totalStreetLength * $costMaterial;

    // menghitung biaya tukang
    $totalStreetLengthInKilo = $totalStreetLength / $meterKiloRatio;
    $totalWorkerFee          = $totalStreetLengthInKilo * $workerFee;

    // menghitung keseluruhan biaya
    $totalCost = $totalCostMaterial + $totalWorkerFee;


    // PADA PRACTICE, ADA BEBERAPA VARIABEL YANG SUDAH DIBUATKAN, DAN ADA VARIABLE YANG STUDENT HARUS MENGG-ASSIGN VARIABLE SESUAI KEBUTUHAN SENDIRI
    // LALU DI PRACTICE SETELAH"NYA, BISA DIKURANGI MEMBERIKAN BASE (JIKA PAKEM/DASARNYA MEMANG HARUS DIIKUTI BISA DIBERIKAN BASE)


    // [comment di bawah masukkan sebagai butir soal]
    // melakukan concate dengan single quote string
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cost Calculation</title>
</head>

<body>
    <h1>Calculating Project Cost</h1>
    <!-- BERIKAN MEREKA BASE DESKRIPSINYA, JADI TUGAS MEREKA UNTUK MEMASUKKAN VAR KE DALAM STRING -->
    <!-- PADA BASE, BERIKAN PARAGRAPH MENTAHAN, JADI TUGAS MEREKA UNTUK MEMASUKKAN NILAI VAR KE DALAMNYA -->
    <!-- UNTUK TEMPLATE LAYOUT, PAKAI CDN BOOTSTRAP DARI AWAL, SERTAKAN STRUKTURNYA LANGSUNG PADA BASE PRACTICE JADI BUKAN MEREKA YANG NULIS -->
    <p>To carry out road repairs with a total length of "total_street_length" meters, Perumahan Graha Sentosa must prepare a total cost of Rp. "total_cost".</p>

    <!-- JADI ENTAH DIBUAT DENGAN CARA INI: -->
    <p>Description: <?= "To carry out road repairs with a total length of {$totalStreetLength} meters, Perumahan Graha Sentosa must prepare a total cost of Rp. {$totalCost}." ?></p>
    <!-- ATAU DENGAN CARA INI: -->
    <p>Description: To carry out road repairs with a total length of <?= $totalStreetLength ?> meters, Perumahan Graha Sentosa must prepare a total cost of Rp. <?= $totalCost ?>.</p>
</body>

</html>