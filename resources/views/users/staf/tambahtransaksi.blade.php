@extends('users.master')

@section('content')
    <main class="content px-3 py-4">
        <div class="container-fluid">
            <h5>Tambah Transaksi</h5>
            <form method="POST" action="{{ route('staf.simpantransaksi') }}" class="mb-3">
                @csrf
                <div class="mb-3">
                    <label>Produk</label>
                    <select name="produk_id" class="form-control">
                        @foreach ($produk as $prd)
                            <option value="{{ $prd->id }}">{{ $prd->nama_produk }} (Stok: {{ $prd->stok }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Jenis Transaksi</label>
                    <select name="jenis" class="form-control">
                        <option>Pilih Jenis Transaksi</option>
                        <option value="masuk">Barang Masuk</option>
                        <option value="keluar">Barang Keluar</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" min="1" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </main>
@endsection
