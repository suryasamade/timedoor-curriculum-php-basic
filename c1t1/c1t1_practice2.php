<!-- CASE -->
<!-- 
    sertakan code-base struktur html
    PHP file naming
    manfaatkan variable untuk menyimpan nilai string
    tampilkan isi variable dan gabungkan (concatetinating) ke dalam string
    integrasikan/gabungkan PHP dengan HTML
-->

<?php
    $name     = "Alex Ferguson";
    $address  = "Glasgow, UK";
    $bornDate = "31 December 1941";
    $job      = "Football Manager";
    $bioTitle = "Biodata of Alex Ferguson";
    $bioDesc  = "A Football Manager of Manchester United Football Club. He was born on 31 December 1941 and live at Glasgow, UK.";
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
    <p><?php echo $bioDesc ?></p>
</body>

</html>