<?php

namespace App\Services;

class ProdukService
{
    public function getAllProduk()
    {
        return [
            [
                'nama' => 'Laptop',
                'kategori' => 'Elektronik',
                'harga' => 7500000,
                'stok' => 5
            ],
            [
                'nama' => 'Mouse Logitech',
                'kategori' => 'Elektronik',
                'harga' => 250000,
                'stok' => 10
            ],
            [
                'nama' => 'Keyboard',
                'kategori' => 'Elektronik',
                'harga' => 100000,
                'stok' => 0
            ],
            [
                'nama' => 'PC',
                'kategori' => 'Elektronik',
                'harga' => 450000,
                'stok' => 3
            ],
            [
                'nama' => 'Headset',
                'kategori' => 'Elektronik',
                'harga' => 350000,
                'stok' => 7
            ]
        ];
    }
}