<!-- CASE -->
<!-- 
    sertakan code-base struktur html
    PHP file naming
    manfaatkan variable untuk menyimpan nilai string
    tampilkan isi variable dan gabungkan (concatetinating) ke dalam string
    integrasikan/gabungkan PHP dengan HTML
-->

<?php
// HARDCODE AJA DULU, BELUM CONCAT
// BELUM DIAJARIN MANIPULASI TAPI KOK SDH MAKE CONCATE
// SPASI UNTUK VARIABLE JANGAN KEJAUHAN/TERLALU LEBAR
// INGAT BERIKAN INDENT PADA KODE PHP
// BEST PRACTICE: APIT VARIABLE DI DALAM STRING DENGAN KURAWAL
    $name            = "Alex Ferguson";
    $address         = "Glasgow, UK";
    $bornDate        = "31 December 1941";
    $job             = "Football Manager";
    $bioTitle        = "Biodata $name";
    $bioDesctription = "A $job of Manchester United Football Club. He was born on $bornDate and live at $address.";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- [explain on material] jika hanya untuk melakukan echo untuk satu baris saja, diperbolehkan untuk tidak menutupnya dengan semi-colon ';' -->
    <title><?php echo $name ?></title>
</head>

<body>
    <h1>
        <?php echo $bioTitle ?>
        <!-- [explain on material] mencetak nilai dapat juga dilakukan dengan shorthand atau meringkas penulisannya 'tanpa' menggunakan fungsi 'echo', dengan menulis sintaks berikut -->
        <?= $bioTitle ?>
    </h1>
    <p><?php echo $bioDesctription ?></p>
</body>

</html>