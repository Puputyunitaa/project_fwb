@extends('users.master')

@section('content')
<main class="content px-3 py-4">
    <div class="container-fluid">
        <h5 class="mb-4">Daftar Kategori</h5>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategori as $kg)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kg->nama_kategori }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">Tidak ada kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
@endsection
