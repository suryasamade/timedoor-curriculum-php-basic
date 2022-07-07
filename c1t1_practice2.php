<!-- SKENARIO -->
<!-- manfaatkan variable untuk menyimpan nilai string -->
<!-- tampilkan isi variable dan gabungkan (concatetinating) ke dalam string -->
<!-- integrasikan/gabungkan PHP dengan HTML -->
<!-- PHP file naming -->

<?php
$name = "Alex Ferguson";
$address = "Glasgow, UK";
$born_date = "31 December 1941";
$job = "Football Manager";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $name ?></title>
</head>

<body>
    <h1>
        <!-- jika hanya untuk melakukan echo untuk satu baris saja, diperbolehkan untuk tidak menutupnya dengan semi-colon ';' -->
        <?php echo "Biodata $name" ?>
        <!-- atau dapat juga dilakukan dengan shorthand atau meringkas penulisannya 'tanpa' menggunakan echo, dengan menulis sintaks berikut -->
    </h1>
    <p><?php echo "A $job of Manchester United Football Club. He was born on $born_date and live at $address." ?></p>
</body>

</html>