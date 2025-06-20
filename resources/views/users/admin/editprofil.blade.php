@extends('users.master')

@section('content')
    <main class="content px-3 py-4">
        <div class="container-fluid">
            <h5>Update Profil</h5>
            <form method="POST" action="{{ route('simpanedit',$profil->id) }}" class="mb-3">
                @csrf
                <div class="mb-3">
                    <label for="value1" class="form-label">Alamat</label>
                    <input type="text" class="form-control" placeholder="Nama profil" name="alamat" value="{{ $profil->alamat }}" required><br>
                      <label for="value1" class="form-label">No Telepon</label>
                    <input type="text" class="form-control" placeholder="No Telepon" name="no_hp" value="{{ $profil->no_hp }}" required><br>

                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                {{-- <a href=" " class="btn btn-secondary" name="add" id="btnCancel">Batal</a> --}}
            </form>
        </div>
    </main>
@endsection
