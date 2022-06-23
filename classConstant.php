<?php

class PracticeClass
{
    const KONSTAN = "Thank's from `Constant`!";

    function CallTheConst()
    {
        return self::KONSTAN;
    }
}

echo PracticeClass::KONSTAN;
echo "<br>";
$practice = new PracticeClass;
echo $practice->CallTheConst();
/* 
output:
Thank's from `Constant`!
Thank's from `Constant`!
*/