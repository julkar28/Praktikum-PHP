<?php
class Bmi
{
   public $nama;
   public $umur;
   public $jenis_kelamin;
   private $berat;
   private $tinggi;

   function __construct($nama, $umur, $gender, $berat, $tinggi)
   {
      $this->nama = $nama;
      $this->umur = $umur;
      $this->jenis_kelamin = $gender;
      $this->berat = $berat;
      $this->tinggi = $tinggi / 100;
   }

   function hasilBMI()
   {
      return round($this->berat / $this->tinggi ** 2, 2);
   }

   function statusBMI($bmi)
   {
      if ($bmi < 18.5) {
         return 'Kekurangan Berat Badan';
      } elseif ($bmi <= 24.9) {
         return 'Normal (Ideal)';
      } elseif ($bmi <= 29.9) {
         return 'Kelebihan Berat Badan';
      } else {
         return 'Kegemukan (Obesitas)';
      }
   }
}
?>