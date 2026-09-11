<?php

class Buku
{
    private string $kode;
    private string $judul;
    private string $penulis;
    private int $tahunTerbit;
    private bool $sedangDipinjam = false;

    // Constructor
    public function __construct(
        string $kode,
        string $judul,
        string $penulis,
        int $tahunTerbit
    ) {
        $this->kode = $kode;
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->tahunTerbit = $tahunTerbit;
    }

    // Method untuk meminjam buku
    public function pinjam(): string
    {
        if ($this->sedangDipinjam == false) {
            $this->sedangDipinjam = true;
            return "Buku berhasil dipinjam.";
        } else {
            return "Buku sedang dipinjam, tidak boleh dipinjam kembali.";
        }
    }

    // Method untuk mengembalikan buku
    public function kembalikan(): string
    {
        if ($this->sedangDipinjam == true) {
            $this->sedangDipinjam = false;
            return "Buku berhasil dikembalikan.";
        } else {
            return "Buku belum dipinjam.";
        }
    }

    // Method untuk mendapatkan status buku
    public function getStatus(): string
    {
        if ($this->sedangDipinjam == true) {
            return "Dipinjam";
        } else {
            return "Tersedia";
        }
    }

    // Method untuk mendapatkan seluruh data buku
    public function getData(): array
    {
        $kode = $this->kode;
        $judul = $this->judul;
        $penulis = $this->penulis;
        $tahunTerbit = $this->tahunTerbit;
        $status = $this->getStatus();

        return compact(
            'kode',
            'judul',
            'penulis',
            'tahunTerbit',
            'status'
        );
    }
}


// Membuat 3 object buku
$buku1 = new Buku(
    "B001",
    "Pemrograman PHP",
    "Andi Setiawan",
    2022
);

$buku2 = new Buku(
    "B002",
    "Belajar Laravel",
    "Budi Santoso",
    2023
);

$buku3 = new Buku(
    "B003",
    "Dasar-Dasar OOP",
    "Citra Permata",
    2024
);


// Menyimpan object ke dalam array
$daftarBuku = [
    $buku1,
    $buku2,
    $buku3
];


// ==========================================
// DAFTAR BUKU PERPUSTAKAAN
// ==========================================

echo "<h2>DAFTAR BUKU PERPUSTAKAAN</h2>";

foreach ($daftarBuku as $buku) {

    $data = $buku->getData();

    echo "Kode: " . $data['kode'] . "<br>";
    echo "Judul: " . $data['judul'] . "<br>";
    echo "Penulis: " . $data['penulis'] . "<br>";
    echo "Tahun Terbit: " . $data['tahunTerbit'] . "<br>";
    echo "Status: " . $data['status'] . "<br>";

    echo "<hr>";
}


// ==========================================
// PENGUJIAN PEMINJAMAN
// ==========================================

echo "<h2>PENGUJIAN PEMINJAMAN</h2>";

echo "1. " . $buku1->pinjam() . "<br>";

echo "2. " . $buku1->pinjam() . "<br>";

echo "3. " . $buku1->kembalikan() . "<br>";

echo "4. Status akhir: " . $buku1->getStatus() . "<br>";

?>