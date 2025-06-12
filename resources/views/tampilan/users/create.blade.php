@extends('layouts.index')

@section('content')
<div class="container">
    <h2>Tambah User</h2>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="name" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <label>Role:</label>
        <select name="role_id" required>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select><br>

        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
