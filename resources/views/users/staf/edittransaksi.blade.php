@extends('users.master')

@section('content')
    <main class="content px-3 py-4">
        <div class="container-fluid">
            <h5>Edit Transaksi</h5>
            <form method="POST" action="{{ route('staf.updatetransaksi', $transaksi->id) }}">
                @csrf
                <div class="mb-3">
                    <label>Produk</label>
                    <select name="produk_id" class="form-control">
                        @foreach ($produk as $prd)
                            <option value="{{ $prd->id }}" {{ $prd->id == $transaksi->produk_id ? 'selected' : '' }}>
                                {{ $prd->nama_produk }} (Stok: {{ $prd->stok }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Jenis</label>
                    <select name="jenis" class="form-control">
                        <option value="masuk" {{ $transaksi->jenis == 'masuk' ? 'selected' : '' }}>Barang Masuk</option>
                        <option value="keluar" {{ $transaksi->jenis == 'keluar' ? 'selected' : '' }}>Barang Keluar</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" min="1"
                        value="{{ $transaksi->jumlah }}">
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="{{ route('staf.lihattransaksi') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </main>
@endsection
