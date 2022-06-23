<?php
$varDeclare1;
var_dump($varDeclare1);
/* $varDeclare1; adalah contoh deklarasi variable (kosong) yang salah, 
karena akan menghasilkan warning undefined variable saat dijalankan */

$varDeclare2 = null;
var_dump($varDeclare2);
// $varDeclare2 = null; adalah contoh deklarasi variable (kosong) yang benar

$varInitial = true;
var_dump($varInitial);

/* dibawah ini adalah contoh assigning (penugasan) dari variable $varDeclare1
yang telah dideklarasikan sebelumnya */
$varDeclare1 = "nilai dari variable declare berupa teks";
var_dump($varDeclare1);
