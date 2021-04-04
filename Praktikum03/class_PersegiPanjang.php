<?php
class PersegiPanjang
{
    // a. Variabel apa saja yang ada dalam persegi Panjang => variabel panjang dan variabel lebar
    private $panjang;
    private $lebar;
    function __construct($p, $l)
    {
        $this->panjang = $p;
        $this->lebar = $l;
    }
    // b. Buatlah method yang mengembalikan luas dan keliling dari persegi panjang
    // ->
    function getLuas()
    {
        return $this->panjang * $this->lebar;
    }
    function getKeliling()
    {
        return 2 * ($this->panjang + $this->lebar);
    }
}
?>