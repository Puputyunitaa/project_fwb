@extends('layouts.index')

@section('content')
<div class="card p-3 mt-2">
    <h4 class="text-center">Selamat datang di Halaman, {{ auth()->user()->name }}🐰🌸</h4>

</div>
<div class="card p-4">
    <h3 class="text-center mb-4">Dashboard</h3>
    <div class="row text-center">
        <div class="col-md-3">
            <div class="card bg-light p-3 mb-3">Produk: {{ $productCount }}</div>
        </div>
        <div class="col-md-3">
            <div class="card bg-light p-3 mb-3">Kategori: {{ $categoryCount }}</div>
        </div>
        <div class="col-md-3">
            <div class="card bg-light p-3 mb-3">Supplier: {{ $supplierCount }}</div>
        </div>
        <div class="col-md-3">
            <div class="card bg-light p-3 mb-3">User: {{ $userCount }}</div>
        </div>
    </div>
</div>



@endsection
