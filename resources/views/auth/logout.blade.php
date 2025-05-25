@extends('layouts.index')

@section('content')
<div class="card p-4 col-md-6 offset-md-3 mt-5 text-center">
    <h1>Selamat Datang, {{ auth()->user()->name }} 💕</h1>
    <p>Ini adalah dashboard imutmu 🐰🌸</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger mt-4">Logout</button>
    </form>
</div>
@endsection
