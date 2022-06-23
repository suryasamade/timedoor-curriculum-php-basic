<!-- SKENARIO -->
<!-- membuat array multi-dimensi yang berjenis indexed array dan di dalamnya menyimpan array dengan jenis associative array -->
<!-- lalu mengakses indexed array secara acak memanfaatkan built-in function rand() -->
<!-- dan mengakses assoc array dengan menggunakan 'key' dari array -->

<?php
$quotes = [
    [
        "author" => "Desmond Tutu",
        "quote" => "Hope is being able to see that there is light despite all of the darkness."
    ],
    [
        "author" => "Henry Miller",
        "quote" => "Every man has his own destiny: the only imperative is to follow it, to accept it, no matter where it leads him."
    ],
    [
        "author" => "Ludwig van Beethoven",
        "quote" => "Art! Who comprehends her? With whom can one consult concerning this great goddess?"
    ],
    [
        "author" => "Charles Dickens",
        "quote" => "I only ask to be free. The butterflies are free."
    ],
    [
        "author" => "Cavett Robert",
        "quote" => "If you don't think every day is a good day, just try missing one."
    ],
    [
        "author" => "Dan Brown",
        "quote" => "Sometimes a legend that endures for centuries...endures for a reason."
    ],
    [
        "author" => "Nelson Mandela",
        "quote" => "The greatest glory in living lies not in never falling, but in rising every time we fall."
    ],
    [
        "author" => "Steve Jobs",
        "quote" => "Your time is limited, so don't waste it living someone else's life. Don't be trapped by dogma – which is living with the results of other people's thinking."
    ],
    [
        "author" => "Walt Disney",
        "quote" => "The way to get started is to quit talking and begin doing."
    ],
    [
        "author" => "Eleanor Roosevelt",
        "quote" => "If life were predictable it would cease to be life, and be without flavor."
    ],
];

$randomQuote = $quotes[rand(0, count($quotes) - 1)];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>The Random Quotes</title>
</head>

<body style="width: 50%;">
    <h1>Quote of the day!</h1>
    <p>Press <code>F5</code> to randomize the quote.</p>
    <h3><b>"<?= $randomQuote["quote"] ?>"</b> - <?= $randomQuote["author"] ?></h3>
</body>

</html>