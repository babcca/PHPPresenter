<?php
//Cena eura, pro prevod
$euro = 25;
// cena parkovani za den (v eurech)
$parking = 10 * $euro;
//cena snidani za cloveka za den (v eurech)
$breakfast = 5 * $euro;
// cena za prepravu za jedno auto
$transport = 40 * $euro;
// Cena jednoho cloveka za
// p = clovek
// >= vetsi nebo rovno
$day_tax = array(
					/*  1p    2p   3p  >=4p */
/*    1 den => */ array(1450, 725, 700, 700),
/* >= 2 dny => */ array(1450, 725, 625, 550)

);
?>