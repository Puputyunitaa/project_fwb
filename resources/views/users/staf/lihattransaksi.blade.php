@extends('users.master')

@section('content')
    <main class="content px-3 py-4">
        <div class="container-fluid">
            <h5 class="mb-4">Daftar Transaksi</h5>

            <a href="{{ route('staf.tambahtransaksi') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksi as $trx)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $trx->produk->nama_produk }}</td>
                            <td>
                                @if ($trx->jenis === 'masuk')
                                    <span class="badge bg-success">Masuk</span>
                                @else
                                    <span class="badge bg-danger">Keluar</span>
                                @endif
                            </td>
                            <td>{{ $trx->jumlah }}</td>
                            <td>
                                @if ($trx->subtotal_harga)
                                    Rp {{ number_format($trx->subtotal_harga, 0, ',', '.') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $trx->created_at->format('d-m-Y H:i') }}</td>
                            <td>
                                <a href="{{ route('staf.edittransaksi', $trx->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('staf.deletetransaksi', $trx->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus transaksi ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada transaksi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
@endsection
