<?php

class Kalkulator{
    public $daya;

    public function __construct(){
        $this->daya = 0;
    }

    public function statusDayaBaterai()
    {
        if ($this->daya == 0) {
            $status = 'Kalkulator tidak bisa digunakan (Daya batrai 0%)';
        }
        else {
            $status = 'Kalkulator Siap Digunakan (Daya batrai '. $this->daya . ')';
        }
        return $status;
    }

    public function Penjumlahan(int $bil1, int $bil2){
        return $bil1 + $bil2;
        $this->PenguranganDaya();
        $this->statusDayaBaterai();

    }

    public function Pengurangan(int $bil1, int $bil2){
        return $bil1 - $bil2;
        $this->PenguranganDaya();
        $this->statusDayaBaterai();

    }

    public function PenguranganDaya(){
        $this->daya = $this->daya - ($this->daya * 10/100);
    }

    public function Perkalian(int $bil1, int $bil2){
        return $bil1 * $bil2;
        $this->PenguranganDaya();
        $this->statusDayaBaterai();
    }

    public function Pembagian(int $bil1, int $bil2){
        return $bil1 / $bil2;
        $this->PenguranganDaya();
        $this->statusDayaBaterai();

    }

    public function Pemangkatan(int $bil1, int $bil2){
        $hasil = $bil1 ** $bil2;
        if($hasil>1000000){
            return "Nilai diluar batas yang ditentukan";
            $this->statusDayaBaterai();
        }
        else{
            return $hasil;
            $this->statusDayaBaterai();
        }
    }

    public function IsiDaya(){
        $this->daya = 100;
    }
}

class KalkulatorHemat extends Kalkulator{
    public function PenguranganDaya(){
        return parent::PenguranganDaya();
        $this->daya = $this->daya - ($this->daya * 5/100);
    }
}

$kalkulator = new Kalkulator();
$kalkulatorHemat = new KalkulatorHemat();

// KALKULATOR BIASA
// tambah daya 
echo $kalkulator->IsiDaya();

// tambah, kurang, bagi, kali
echo "10+6 = ";
echo $kalkulator->Penjumlahan(10,6);
echo "10-6 = ";
echo $kalkulator->Pengurangan(10,6);
echo "10:2 = ";
echo $kalkulator->Pembagian(10,2);
echo "10*2 = ";
echo $kalkulator->Perkalian(10,2);
echo "10^2 = ";
echo $kalkulator->Pemangkatan(10,2);

// KALKULATOR HEMAT
echo $kalkulatorHemat->IsiDaya();
echo "10+6 = ";
echo $kalkulatorHemat->Penjumlahan(10,6);

?>