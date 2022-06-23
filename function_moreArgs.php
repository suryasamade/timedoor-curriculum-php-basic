<?php

function arguments($name, $gender, $father, $mother)
{
    if ($gender == "male") {
        $gender = "son";
        $objPron = "him";
    } else {
        $gender = "daughter";
        $objPron = "her";
    }
    echo "$name is $gender of $objPron parents, $father and $mother.\n";
}

arguments("Rob", "male", "Mike", "Luna");
arguments("Lucy", "female", "Lukas", "Cyli");
arguments("Kevin", "male", "Daniel", "Diva");

/* 
output:
Rob is son of him parents, Mike and Luna.
Lucy is daughter of her parents, Lukas and Cyli.
Kevin is son of him parents, Daniel and Diva.
*/