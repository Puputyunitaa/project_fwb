<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
      /**
     * Tampilkan riwayat transaksi untuk Staf & Supervisor
     */
    public function index()
    {
        // Ambil data riwayat transaksi
        // $history = Transaction::orderBy('created_at', 'desc')->get();

        return view('history.index' /*, compact('history') */);
    }
}
