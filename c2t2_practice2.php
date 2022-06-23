<!-- SKENARIO -->
<!-- melakukan merge terhadap array negara anggota asean berdasarkan waktu/periode bergabungnya ke dalam array recentAseanCountries -->
<!-- melakukan push, memasukkan array baru pada akhir elemen sebagai pengandaian negara lain bergabung tanpa membuat variable baru-->
<!-- melakukan pop, menghapus elemen array terakhir untuk mengembalikan jumlah member seharusnya -->

<?php
$aseanCountries = [
    [
        "year" => 1967,
        "members" => [
            ["country" => "Indonesia", "capital" => "Jakarta"],
            ["country" => "Malaysia", "capital" => "Kuala Lumpur"],
            ["country" => "Filipina", "capital" => "Manila"],
            ["country" => "Singapura", "capital" => "Singapura"],
            ["country" => "Thailand", "capital" => "Bangkok"]
        ]
    ]
];

$join1984 = [
    [
        "year" => 1984,
        "members" => [
            ["country" => "Brunei-Darussalam", "capital" => "Bandar Seri Begawan"]
        ]
    ]
];

$join1995 = [
    [
        "year" => 1995,
        "members" => [
            ["country" => "Vietnam", "capital" => "Hanoi"]
        ]
    ]
];

$join1997 = [
    [
        "year" => 1997,
        "members" => [
            ["country" => "Laos", "capital" => "Vientiane"],
            ["country" => "Myanmar", "capital" => "Naypyidaw"]
        ]
    ]
];

$join1999 = [
    [
        "year" => 1999,
        "members" => [
            ["country" => "Kamboja", "capital" => "Phnom Penh"]
        ]
    ]
];

$recentAseanCountries = array_merge($aseanCountries, $join1984, $join1995, $join1997, $join1999);

// tidak perlu dibungkus dengan array luar lagi, karena akan langsung dimasukkan sebagai elemen baru
$supposeNewComerMember = [
    "year" => 2024,
    "members" => [
        ["country" => "Timor-Leste", "capital" => "Dili"]
    ]
];

// memasukkan array lain ke elemen terakhir, mengandaikan member baru
array_push($recentAseanCountries, $supposeNewComerMember);
// mengeluarkan array terakhir dari array
array_pop($recentAseanCountries);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ASEAN Countries History</title>
</head>

<body>
    <?php
    // sebelum array hasil merge digunakan, coba untuk mencetak terlebih dahulu menggunakan fungsi var_dump() atau print_r()
    // var_dump($recentAseanCountries);
    ?>

    <h1>ASEAN Countries History (with its Capital) by Periods</h1>
    <?php foreach ($recentAseanCountries as $period) : ?>
        <p>In <?= $period["year"] . ", the new joiner is:" ?></p>
        <ul>
            <?php foreach ($period["members"] as $member) : ?>
                <li><?= $member["country"] . " (" . $member["capital"] . ")" ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>

    <!-- menampilkan keseluruhan asean member -->
    <h3>So until now ASEAN members consist of:</h3>
    <ol>
        <?php foreach ($recentAseanCountries as $period) : ?>
            <?php foreach ($period["members"] as $member) : ?>
                <li><?= $member["country"] . " (" . $member["capital"] . ")" ?></li>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </ol>
</body>

</html>