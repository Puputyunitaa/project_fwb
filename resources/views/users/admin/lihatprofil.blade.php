@extends('users.master')

@section('content')
    <main class="content px-3 py-4">
        <div class="container-fluid">
             @if (session('success'))
            <div class="alert alert-success"> 
            {{ session('success') }}
            </div>
             @endif
            <h5>Daftar Profil</h5>
            @if ($profil->isEmpty())
                
            <a href="{{ route('tambahProfil') }}" class="btn btn-primary mb-3">Tambah Profil</a>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>

                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($profil as $pro)
                        <tr>
                            <td>{{ $pro->alamat }}</td>
                            <td>{{ $pro->no_hp }}</td>
                            <td>
                                <a href="{{ route('editProfil', $pro->id) }}" class="btn btn-warning btnEdit">Edit</a>
                                <form action="{{ route('deleteprofil', $pro->id) }}" method="POST" style="display:inline;">

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
