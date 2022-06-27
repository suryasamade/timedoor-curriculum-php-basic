<!-- SKENARIO -->
<!-- IF - ELSE -->
<!-- concatenation types: '.' & '.=' -->
<!-- membatasi hanya agar memasukkan nilai bilangan bulat (int) -->
<!-- menentukan jenis tanggal apakah termasuk ganjil/genap -->
<!-- menentukan kegiatan berdasarkan jenis tanggal -->

<?php
$todayDate = 27;
$myActivity = "Hari ini Saya akan ";
$dateStatus = "karena hari ini adalah tanggal ";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ODD - EVEN NUMBER</title>
</head>

<body>
    <?php

    if (is_int($todayDate)) {
        if ($todayDate % 2 == 0) {
            // concate assignment
            $myActivity .= 'membaca 100 halaman buku';
            $dateStatus .= 'genap';
            // concate
            echo $myActivity . ', ' . $dateStatus . '.';
        } else {
            $myActivity .= "pergi ke Gym untuk berolahraga selama 2 jam";
            $dateStatus .= "ganjil";
            echo "$myActivity, $dateStatus.";
        }
    } else {
        echo "Tanggal Anda tidak diterima, gunakan tipe data integer!";
    }
    ?>
</body>

</html>