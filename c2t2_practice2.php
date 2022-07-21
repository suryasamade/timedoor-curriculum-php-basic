<!-- CASE -->
<!-- 
    1. buat form untuk input author dan quote baru
    2. tangkap dan lakukan evaluasi pada input, hanya input yang di-set dan tidak kosong saja yang akan disimpan sebagai array associative
    3. gabungkan (push) array hasil input dengan existing array, hanya jika seluruh evaluasi sebelumnya bernilai true
    4. tambahkan sebuah input checkbox 'show my (input) quote', jika dicentang maka akan menampilkan quote hasil inputan, jika tidak dicentang akan ditampilkan quote hasil random
 -->

<?php

$quotes = [
    [
        "author"    => "Ludwig van Beethoven",
        "quote"     => "Art! Who comprehends her? With whom can one consult concerning this great goddess?"
    ],
    [
        "author"    => "Nelson Mandela",
        "quote"     => "The greatest glory in living lies not in never falling, but in rising every time we fall."
    ],
    [
        "author"    => "Steve Jobs",
        "quote"     => "Your time is limited, so don't waste it living someone else's life. Don't be trapped by dogma – which is living with the results of other people's thinking."
    ],
    [
        "author"    => "Walt Disney",
        "quote"     => "The way to get started is to quit talking and begin doing."
    ],
    [
        "author"    => "Eleanor Roosevelt",
        "quote"     => "If life were predictable it would cease to be life, and be without flavor."
    ]
];

if ((isset($_GET['author']) && !empty($_GET['author'])) && (isset($_GET['quote']) && !empty($_GET['quote']))) {
    $inputQuote = [
        "author"    => $_GET['author'],
        "quote"     => $_GET['quote']
    ];

    array_push($quotes, $inputQuote);
}

if (isset($_GET['my_quote'])) {
    $randomQuote = $quotes[count($quotes) - 1];
} else {
    $randomQuote = $quotes[rand(0, count($quotes) - 1)];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>The Random Quotes</title>
</head>

<body style="width: 50%;">
    <h1>Quote of the day!</h1>
    <p>Press <code>F5</code> or <code>Ctrl + R</code> to randomize the quote.</p>
    <h3><b>"<?= $randomQuote["quote"] ?>"</b> - <?= $randomQuote["author"] ?></h3>
    <form action="" method="get">
        <label for="author_name">Author Name</label>
        <input type="text" name="author" id="author_name"><br>
        <label for="quote_inspirational">Inspirational Quote</label>
        <input type="text" name="quote" id="quote_inspirational"><br>
        <label for="show_my_quote">Show my input quote</label>
        <input type="checkbox" name="my_quote" id="show_my_quote"><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>