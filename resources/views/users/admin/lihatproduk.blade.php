@extends('users.master')

@section('content')
    <main class="content px-3 py-4">
        <div class="container-fluid">
              @if (session('success'))
            <div class="alert alert-success"> 
            {{ session('success') }}
            </div>
                @endif
            <h5>Daftar Produk</h5>

            <a href="{{ route('admin.tambahproduk') }}" class="btn btn-primary mb-3">Tambah Produk</a>
          
    
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Nama Produk</th>
                        <th>Gambar</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $prd)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $prd->produk->kategori->nama_kategori }}</td>
                            <td>{{ $prd->produk->nama_produk }}</td>
                            <td>
                            <img src="{{ asset('storage/' . $prd->produk->gambar) }}" alt="Gambar Produk" width="150">
                            </td> 
                              <td>{{ $prd->supplier->nama_supplier }}</td>
                                 <td>{{ $prd->supplier->alamat }}</td>
                                    <td>{{ $prd->supplier->telepon }}</td>
                            <td>{{ $prd->produk->harga }}</td>
                            <td>{{ $prd->produk->stok }}</td>
                            <td>
                                <a href="{{ route('admin.editproduk', $prd->id) }}" class="btn btn-warning btnEdit">Edit</a>
                                <form action="{{ route('admin.deleteproduk', $prd->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Sure you want to delete?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
