<?php 

// ========================================
// CLASS INDUK KENDARAAN
// ========================================

class Kendaraan 
{ 
    protected string $kode; 
    protected string $merek; 
    protected float $tarifPerHari; 
    protected string $status; 

    public function __construct( 
        string $kode, 
        string $merek, 
        float $tarifPerHari 
    ) { 
        if ($tarifPerHari < 0) { 
            throw new InvalidArgumentException( 
                "Tarif per hari tidak boleh negatif" 
            ); 
        } 

        $this->kode = $kode; 
        $this->merek = $merek; 
        $this->tarifPerHari = $tarifPerHari; 
        $this->status = "Tersedia"; 
    } 

    // Method untuk menyewa kendaraan
    public function sewa(): string 
    { 
        if ($this->status === "Disewa") { 
            return "Kendaraan sedang disewa"; 
        } 

        $this->status = "Disewa"; 

        return "Kendaraan berhasil disewa"; 
    } 

    // Method untuk mengembalikan kendaraan
    public function kembalikan(): string 
    { 
        if ($this->status === "Tersedia") { 
            return "Kendaraan belum disewa"; 
        } 

        $this->status = "Tersedia"; 

        return "Kendaraan berhasil dikembalikan"; 
    } 

    // Method menghitung biaya dasar
    public function hitungBiaya(int $lamaSewa): float 
    { 
        if ($lamaSewa <= 0) { 
            return 0; 
        } 

        return $this->tarifPerHari * $lamaSewa; 
    } 

    // Mengembalikan data dalam associative array
    public function getData(): array 
    { 
        $kode = $this->kode; 
        $merek = $this->merek; 
        $tarifPerHari = $this->tarifPerHari; 
        $status = $this->status; 

        return compact( 
            'kode', 
            'merek', 
            'tarifPerHari', 
            'status' 
        ); 
    } 
} 


// ========================================
// CLASS TURUNAN MOBIL
// ========================================

class Mobil extends Kendaraan 
{ 
    private float $biayaAsuransi = 50000; 

    public function hitungBiaya(int $lamaSewa): float 
    { 
        if ($lamaSewa <= 0) { 
            return 0; 
        } 

        return ($this->tarifPerHari * $lamaSewa) 
            + $this->biayaAsuransi; 
    } 
} 


// ========================================
// CLASS TURUNAN MOTOR
// ========================================

class Motor extends Kendaraan 
{ 
    public function hitungBiaya(int $lamaSewa): float 
    { 
        if ($lamaSewa <= 0) { 
            return 0; 
        } 

        return $this->tarifPerHari * $lamaSewa; 
    } 
} 


// ========================================
// MEMBUAT OBJECT KENDARAAN
// ========================================

$mobil1 = new Mobil( 
    "M001", 
    "Toyota Avanza", 
    300000 
); 

$mobil2 = new Mobil( 
    "M002", 
    "Honda Brio", 
    250000 
); 

$motor1 = new Motor( 
    "T001", 
    "Honda Beat", 
    100000 
); 

$motor2 = new Motor( 
    "T002", 
    "Yamaha NMAX", 
    150000 
); 


// ========================================
// MENYIMPAN OBJECT KE ARRAY
// ========================================

$daftarKendaraan = [ 
    $mobil1, 
    $mobil2, 
    $motor1, 
    $motor2 
]; 


// ========================================
// MENAMPILKAN KENDARAAN TERSEDIA
// ========================================

echo "<h2>Daftar Kendaraan Tersedia</h2>"; 

foreach ($daftarKendaraan as $kendaraan) { 

    $data = $kendaraan->getData(); 

    if ($data['status'] === "Tersedia") { 

        echo "Kode: " . $data['kode'] . "<br>"; 
        echo "Merek: " . $data['merek'] . "<br>"; 
        echo "Tarif per Hari: Rp" 
            . number_format( 
                $data['tarifPerHari'], 
                0, 
                ',', 
                '.' 
            ) 
            . "<br>"; 
        echo "Status: " . $data['status'] . "<br>"; 
        echo "<hr>"; 
    } 
} 


// ========================================
// UJI PROGRAM
// DILETAKKAN PALING BAWAH
// ========================================


// UJI SEWA ULANG
echo "<h2>Uji Penyewaan</h2>"; 

echo $mobil1->sewa() . "<br>"; 

echo $mobil1->sewa() . "<br>"; 


// UJI PENGEMBALIAN
echo "<h2>Uji Pengembalian</h2>"; 

echo $mobil1->kembalikan() . "<br>"; 


// UJI BIAYA MOBIL
echo "<h2>Biaya Sewa Mobil</h2>"; 

$biayaMobil = $mobil1->hitungBiaya(3); 

echo "Toyota Avanza 3 hari: Rp" 
    . number_format( 
        $biayaMobil, 
        0, 
        ',', 
        '.' 
    ) 
    . "<br>"; 


// UJI BIAYA MOTOR
echo "<h2>Biaya Sewa Motor</h2>"; 

$biayaMotor = $motor1->hitungBiaya(3); 

echo "Honda Beat 3 hari: Rp" 
    . number_format( 
        $biayaMotor, 
        0, 
        ',', 
        '.' 
    ) 
    . "<br>"; 

?>