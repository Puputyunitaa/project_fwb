@extends('users.master')

@section('content')
<main class="content px-3 py-4">
    <div class="container-fluid">
        <h5 class="mb-4">Daftar Produk</h5>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Nama Produk</th>
                    <th>Gambar</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produk as $prd)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $prd->kategori->nama_kategori }}</td>
                        <td>{{ $prd->nama_produk }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $prd->gambar) }}" alt="Gambar" width="100">
                        </td>
                        <td>Rp {{ number_format($prd->harga, 0, ',', '.') }}</td>
                        <td>{{ $prd->stok }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
@endsection
