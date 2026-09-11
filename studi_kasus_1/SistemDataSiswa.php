<?php

class Siswa
{
    // Property
    private $nama;
    private $NIS;
    private $kelas;
    private $nilai;

    // Constructor
    public function __construct($nama, $NIS, $kelas, $nilai)
    {
        $this->nama = $nama;
        $this->NIS = $NIS;
        $this->kelas = $kelas;
        $this->nilai = $nilai;
    }

    // Method untuk mengecek kelulusan
    public function cekKelulusan()
    {
        if ($this->nilai >= 75) {
            return "Lulus";
        }

        return "Tidak Lulus";
    }

    // Method untuk mengambil seluruh data
    private function getData()
    {
        $nama = $this->nama;
        $NIS = $this->NIS;
        $kelas = $this->kelas;
        $nilai = $this->nilai;

        return compact('nama', 'NIS', 'kelas', 'nilai');
    }

    // Method untuk menampilkan data
    public function tampilkanData()
    {
        $data = $this->getData();

        echo "Nama: " . $data['nama'] . "<br>";
        echo "NIS: " . $data['NIS'] . "<br>";
        echo "Kelas: " . $data['kelas'] . "<br>";
        echo "Nilai: " . $data['nilai'] . "<br>";
        echo "Status: " . $this->cekKelulusan() . "<br>";
        echo "--------------------------<br>";
    }
}

// Object siswa
$siswa1 = new Siswa("Andi", "1001", "XI PPLG 1", 85);
$siswa2 = new Siswa("Budi", "1002", "XI PPLG 1", 75);
$siswa3 = new Siswa("Citra", "1003", "XI PPLG 2", 65);

// Array berisi object siswa
$daftarSiswa = [$siswa1, $siswa2, $siswa3];

// Menampilkan data dengan foreach
foreach ($daftarSiswa as $siswa) {
    $siswa->tampilkanData();
}

?>
