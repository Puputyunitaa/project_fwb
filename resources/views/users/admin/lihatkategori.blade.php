@extends('users.master')

@section('content')
    <main class="content px-3 py-4">
          <div class="container-fluid">
              @if (session('success'))
            <div class="alert alert-success"> 
            {{ session('success') }}
            </div>
             @endif
        <div class="container-fluid">
            <h5>Daftar Kategori</h5>

            <a href="{{ route('admin.tambahkategori') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $kg)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kg->nama_kategori }}</td>
                            <td>
                                <a href="{{ route('admin.editkategori', $kg->id) }}" class="btn btn-warning btnEdit">Edit</a>
                                <form action="{{ route('admin.deletekategori', $kg->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
