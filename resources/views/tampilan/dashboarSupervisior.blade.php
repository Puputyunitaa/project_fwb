@extends('layouts.index')

@section('content')
<div class="card p-3 mt-2">
    <h4 class="text-center">Selamat datang di Halaman, {{ auth()->user()->name }}🐰🌸</h4>

</div>



@endsection
