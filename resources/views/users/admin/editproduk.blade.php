{{-- @extends('users.master')

@section('content')
    <main class="content px-3 py-4">
        <div class="container-fluid">
            <h5>Edit Kategori</h5>
            <form method="POST" action="{{ route('admin.updateproduk', $produk->id) }}" class="mb-3"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="code">Id Kategori</label>
                    <select name="kategori_id" id="code">
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategori as $kg)
                            <option value="{{ $kg->id }}" {{ $produk->kategori_id == $kg->id ? 'selected' : '' }}>
                                {{ $kg->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="code" placeholder="nama_produk" name="nama_produk"
                        value="{{ $produk->nama_produk }}" required>
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="code" placeholder="gambar" name="gambar">
                    @if ($produk->gambar)
                        <div>
                            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="" width="150">
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="code" placeholder="harga" name="harga"
                        value="{{ $produk->harga }}" required>
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="code" placeholder="stok" name="stok"
                        value="{{ $produk->stok }}" required>
                </div>
                
                <button type="submit" class="btn btn-warning" name="add" id="submitEdit">Edit</button>
                <a href="{{ route('admin.lihatproduk') }}" class="btn btn-secondary" name="add" id="btnCancel">Batal</a>
            </form>
        </div>
    </main>
@endsection --}}
{{-- filepath: resources/views/users/admin/editproduk.blade.php --}}
@extends('users.master')

@section('content')
    <main class="content px-3 py-4">
        <div class="container-fluid">
            <h5>Edit Produk dan Supplier</h5>
            <form method="POST" action="{{ route('admin.updateproduk',  $produk_supplier->id) }}" class="mb-3" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="kategori_id">Kategori</label>
                    <select name="kategori_id" id="kategori_id" class="form-select" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategori as $kg)
                            <option value="{{ $kg->id }}" {{ $produk->kategori_id == $kg->id ? 'selected' : '' }}>
                                {{ $kg->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                        value="{{ $produk->nama_produk }}" required>
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    @if ($produk->gambar)
                        <div>
                            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Gambar Produk" width="150">
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga"
                        value="{{ $produk->harga }}" required>
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok"
                        value="{{ $produk->stok }}" required>
                </div>

                <hr>
                <h5 class="mt-4">Data Supplier</h5>
                @php
                    // Ambil supplier dari relasi pivot jika ada
                    $pivot = $produk->suplier_produks->first();
                    $supplier = $pivot && $pivot->supplier ? $pivot->supplier : null;
                @endphp
{{-- 
                <div class="mb-3">
                    <label for="nama_supplier" class="form-label">Nama Supplier</label>
                 <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}">
                </div>

                <div class="mb-3">
                    <label for="alamat_supplier" class="form-label">Alamat Supplier</label>
                  <input type="text" name="nalamat" value="{{ $supplier->nama_supplier }}">
                </div>

                <div class="mb-3">
                    <label for="telepon_supplier" class="form-label">Telepon Supplier</label>
                    <input type="text" class="form-control" id="telepon_supplier" name="telepon"
                        value="{{ $supplier->telepon ?? '' }}">
                </div> --}}



                  <div class="mb-3">
                    <label for="nama_supplier" class="form-label">Nama Supplier</label>
                    <input type="text" class="form-control" name="nama_supplier" value="{{ $supplier->nama_supplier }}" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat Supplier</label>
                    <input type="text" class="form-control" name="alamat" value="{{ $supplier->alamat }}" required>
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon Supplier</label>
                    <input type="text" class="form-control" name="telepon" value="{{ $supplier->telepon }}" reqiured>
                </div>

                <button type="submit" class="btn btn-warning">Edit</button>
                <a href="{{ route('admin.lihatproduk') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </main>
@endsection