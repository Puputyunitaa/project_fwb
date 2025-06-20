    {{-- @extends('users.master')

    @section('content')
        <main class="content px-3 py-4">
            <div class="container-fluid">
                <h5>Tambah Kategori</h5>
                <form method="POST" action="{{ route('admin.simpanproduk') }}" class="mb-3" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="code">Id Kategori</label>
                        <select name="kategori_id" id="code">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $kg)
                                <option value="{{ $kg->id }}">{{ $kg->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="code" placeholder="nama_produk" name="nama_produk"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="code" placeholder="gambar" name="gambar" required>
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="code" placeholder="harga" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="code" placeholder="stok" name="stok" required>
                    </div>
                    <button type="submit" class="btn btn-success" name="add" id="submitAdd">Tambah</button>
                    <a href="{{ route('admin.lihatproduk') }}" class="btn btn-secondary" name="add" id="btnCancel">Batal</a>
                </form>

            </div>
        </main>
    @endsection --}}

    @extends('users.master')

@section('content')
    <main class="content px-3 py-4">
        <div class="container-fluid">
            <h5>Tambah Produk dan Supplier</h5>
            <form method="POST" action="{{ route('admin.simpanproduk') }}" class="mb-3" enctype="multipart/form-data">
                @csrf

                {{-- Bagian Produk --}}
                <div class="mb-3">
                    <label for="kategori_id" class="form-label">Kategori</label>
                    <select name="kategori_id" id="kategori_id" class="form-select" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategori as $kg)
                            <option value="{{ $kg->id }}">{{ $kg->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" required>
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control" name="gambar" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" name="harga" required>
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" name="stok" required>
                </div>

                <hr>
                {{-- Bagian Supplier --}}
                <h5 class="mt-4">Data Supplier</h5>

                <div class="mb-3">
                    <label for="nama_supplier" class="form-label">Nama Supplier</label>
                    <input type="text" class="form-control" name="nama_supplier" required>
                </div>

                <div class="mb-3">
                    <label for="alamat_supplier" class="form-label">Alamat Supplier</label>
                    <input type="text" class="form-control" name="alamat">
                </div>

                <div class="mb-3">
                    <label for="telepon_supplier" class="form-label">Telepon Supplier</label>
                    <input type="text" class="form-control" name="telepon">
                </div>

                <button type="submit" class="btn btn-success">Tambah</button>
                <a href="{{ route('admin.lihatproduk') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </main>
@endsection
