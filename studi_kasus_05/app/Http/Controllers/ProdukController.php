<?php

namespace App\Http\Controllers;

use App\Services\ProdukService;

class ProdukController extends Controller
{
    private $produkService;

    public function __construct(ProdukService $produkService)
    {
        $this->produkService = $produkService;
    }

    public function index()
    {
        $produk = $this->produkService->getAllProduk();

        return view('produk.index', compact('produk'));
    }
}