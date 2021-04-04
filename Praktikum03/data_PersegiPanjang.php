<?php
require_once 'class_PersegiPanjang.php';
$pers1 = new PersegiPanjang(10, 5);
$pers2 = new PersegiPanjang(4, 2);
echo "Luas Persegi Panjang I " . $pers1->getLuas();
echo "<br/>Luas Persegi Panjang II " . $pers2->getLuas();
echo "<br/>Keliling Persegi Panjang I " . $pers1->getKeliling();
echo "<br/>Keliling Persegi Panjang II " . $pers2->getKeliling();
?>