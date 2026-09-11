<?php 

class Menu 
{ 
    private string $kode; 
    private string $nama; 
    protected float $harga; 
    private string $kategori; 
    protected int $stok; 

    public function __construct( 
        string $kode, 
        string $nama, 
        float $harga, 
        string $kategori, 
        int $stok 
    ) { 
        if ($harga < 0) { 
            throw new InvalidArgumentException("Harga tidak boleh negatif"); 
        } 

        if ($stok < 0) { 
            throw new InvalidArgumentException("Stok tidak boleh negatif"); 
        } 

        $this->kode = $kode; 
        $this->nama = $nama; 
        $this->harga = $harga; 
        $this->kategori = $kategori; 
        $this->stok = $stok; 
    } 

    public function tambahStok(int $jumlah): string 
    { 
        if ($jumlah <= 0) { 
            return "Jumlah stok yang ditambahkan harus lebih dari 0"; 
        } 

        $this->stok += $jumlah; 

        return "Stok berhasil ditambahkan"; 
    } 

    public function kurangiStok(int $jumlah): string 
    { 
        if ($jumlah <= 0) { 
            return "Jumlah pembelian harus lebih dari 0"; 
        } 

        if ($jumlah > $this->stok) { 
            return "Pembelian melebihi stok"; 
        } 

        $this->stok -= $jumlah; 

        return "Pembelian berhasil"; 
    } 

    public function hitungTotalHarga(int $jumlah): float 
    { 
        if ($jumlah <= 0) { 
            return 0; 
        } 

        return $this->harga * $jumlah; 
    } 

    public function getData(): array 
    { 
        $kode = $this->kode; 
        $nama = $this->nama; 
        $harga = $this->harga; 
        $kategori = $this->kategori; 
        $stok = $this->stok; 

        $status = ($this->stok === 0) 
            ? "Habis" 
            : "Tersedia"; 

        return compact( 
            'kode', 
            'nama', 
            'harga', 
            'kategori', 
            'stok', 
            'status' 
        ); 
    } 
} 


// ==========================================
// CLASS TURUNAN
// ==========================================

class MenuMinuman extends Menu 
{ 
    private string $jenisMinuman; 

    public function __construct( 
        string $kode, 
        string $nama, 
        float $harga, 
        string $kategori, 
        int $stok, 
        string $jenisMinuman 
    ) { 
        parent::__construct( 
            $kode, 
            $nama, 
            $harga, 
            $kategori, 
            $stok 
        ); 

        $this->jenisMinuman = $jenisMinuman; 
    } 
} 


// ==========================================
// MEMBUAT OBJECT MENU
// ==========================================

$menu1 = new Menu( 
    "M001", 
    "Nasi Goreng", 
    15000, 
    "Makanan", 
    10 
); 

$menu2 = new Menu( 
    "M002", 
    "Mie Goreng", 
    12000, 
    "Makanan", 
    8 
); 

$menu3 = new Menu( 
    "M003", 
    "Es Teh", 
    5000, 
    "Minuman", 
    15 
); 

$menu4 = new Menu( 
    "M004", 
    "Jus Jeruk", 
    8000, 
    "Minuman", 
    5 
); 

$menu5 = new MenuMinuman( 
    "M005", 
    "Kopi Susu", 
    10000, 
    "Minuman", 
    0, 
    "Kopi" 
); 


// ==========================================
// MENYIMPAN OBJECT KE ARRAY
// ==========================================

$daftarMenu = [ 
    $menu1, 
    $menu2, 
    $menu3, 
    $menu4, 
    $menu5 
]; 


// ==========================================
// MENAMPILKAN SEMUA MENU
// ==========================================

echo "<h2>Daftar Menu</h2>"; 

foreach ($daftarMenu as $menu) { 
    $data = $menu->getData(); 

    echo "Kode: " . $data['kode'] . "<br>"; 
    echo "Nama: " . $data['nama'] . "<br>"; 
    echo "Harga: Rp" 
        . number_format( 
            $data['harga'], 
            0, 
            ',', 
            '.' 
        ) 
        . "<br>"; 
    echo "Kategori: " . $data['kategori'] . "<br>"; 
    echo "Stok: " . $data['stok'] . "<br>"; 
    echo "Status: " . $data['status'] . "<br>"; 
    echo "<hr>"; 
} 


// ==========================================
// MENU BERDASARKAN KATEGORI
// ==========================================

echo "<h2>Menu Makanan</h2>"; 

foreach ($daftarMenu as $menu) { 
    $data = $menu->getData(); 

    if ($data['kategori'] === "Makanan") { 
        echo "Kode: " . $data['kode'] . "<br>"; 
        echo "Nama: " . $data['nama'] . "<br>"; 
        echo "Harga: Rp" 
            . number_format( 
                $data['harga'], 
                0, 
                ',', 
                '.' 
            ) 
            . "<br>"; 
        echo "Stok: " . $data['stok'] . "<br>"; 
        echo "Status: " . $data['status'] . "<br>"; 
        echo "<hr>"; 
    } 
} 


echo "<h2>Menu Minuman</h2>"; 

foreach ($daftarMenu as $menu) { 
    $data = $menu->getData(); 

    if ($data['kategori'] === "Minuman") { 
        echo "Kode: " . $data['kode'] . "<br>"; 
        echo "Nama: " . $data['nama'] . "<br>"; 
        echo "Harga: Rp" 
            . number_format( 
                $data['harga'], 
                0, 
                ',', 
                '.' 
            ) 
            . "<br>"; 
        echo "Stok: " . $data['stok'] . "<br>"; 
        echo "Status: " . $data['status'] . "<br>"; 
        echo "<hr>"; 
    } 
} 


// ==========================================
// UJI PROGRAM
// DILETAKKAN PALING BAWAH
// ==========================================

echo "<h2>Uji Pembelian</h2>"; 


// 1. Stok cukup
echo $menu1->kurangiStok(2) . "<br>"; 

echo "Total harga 2 Nasi Goreng: Rp" 
    . number_format( 
        $menu1->hitungTotalHarga(2), 
        0, 
        ',', 
        '.' 
    ) 
    . "<br><br>"; 


// 2. Pembelian melebihi stok
echo $menu2->kurangiStok(10) . "<br>"; 


// 3. Menu dengan stok 0
$data = $menu5->getData(); 

echo "Status " . $data['nama'] 
    . ": " . $data['status'] 
    . "<br>"; 

?>