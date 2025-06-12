<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Tampilkan daftar stok barang (Supervisor)
     */
    public function index()
    {
        // Ambil data stok barang dari model Product / Stock
        // $stocks = Product::with('stock')->get();

        return view('stocks.index' /*, compact('stocks') */);
    }
}
