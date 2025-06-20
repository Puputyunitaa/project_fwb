@extends('users.master')

@section('content')
    <main class="content px-3 py-4">
        <div class="container-fluid">
            <h5>Edit Kategori</h5>
            <form method="POST" action="{{ route('admin.updatekategori', $kategori->id) }}" class="mb-3">
                @csrf
                <div class="mb-3">
                    <label for="value1" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" placeholder="nama_kategori" name="nama_kategori"
                        value="{{ $kategori->nama_kategori }}" required>
                </div>
                <button type="submit" class="btn btn-primary" name="add" id="submitEdit">Edit</button>
                <a href="{{ route('admin.lihatkategori') }}" class="btn btn-secondary" name="add" id="btnCancel">Batal</a>
            </form>
        </div>
    </main>
@endsection
