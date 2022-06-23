<!-- SKENARIO -->
<!-- terdapat tiga proyek perbaikan jalan yang sedang di lakukan di perumahan X -->
<!-- jalan pertama memiliki panjang 0.8 kilometer -->
<!-- jalan kedua memiliki panjang 500 meter -->
<!-- dan jalan ketiga sepanjang 2500 centimeter -->
<!-- untuk memperbaiki 1 meter jalan, dibutuhkan biaya untuk material sebesar Rp. 15.000, -->
<!-- dan setiap 1 kilometer upah tukang dibayar sebesar Rp. 650.000 -->
<!-- berapa biaya yang harus disiapkan untuk memperbaiki tiga proyek perbaikan jalan tersebut? -->

<?php
$jalan1 = 0.8;
$jalan2 = '500';
$jalan3 = 2500;

// konversi dulu ke meter dengan assignment operator
$jalan1 *= 1000;
$jalan3 /= 100;

// arithmetic operator
$totalPanjangMeter = $jalan1 + $jalan2 + $jalan3;
$biayaMaterial     = $totalPanjangMeter * 15000;
$upahTukang        = ($totalPanjangMeter / 1000) * 650000;
$totalBiaya        = $biayaMaterial + $upahTukang;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cost Calculating</title>
</head>

<body>
    <h1>Calculating the cost of project</h1>
    <p>
        <?php
        // menggunakan single quote
        echo 'Maka untuk melakukan perbaikan jalan sepanjang ' . $totalPanjangMeter . 'meter, Perumahan X harus menyiapkan total biaya sebesar Rp. ' . $totalBiaya . '.';
        // menggunakan double quote
        echo "Maka untuk melakukan perbaikan jalan sepanjang $totalPanjangMeter meter, Perumahan X harus menyiapkan total biaya sebesar Rp. $totalBiaya.";
        ?>
    </p>
</body>

</html>