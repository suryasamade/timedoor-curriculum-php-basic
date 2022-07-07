<?php

class Mobil
{
    public $warna = "hitam";
    public $dayaKuda = 80;
    public $kapasitasTangki = 20.5;
    public $kapasitasMesin = 1000;
    public $kecepatanMaksimal = 100;

    function kecepatanMaks()
    {
        echo "Mobil ini memiliki kecepatan maksimal $this->kecepatanMaksimal km/h";
    }
}

$perari = new Mobil();
$perari->kecepatanMaksimal = 299;
$perari->kecepatanMaks();
