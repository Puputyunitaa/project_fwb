<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\ProductSupplier;
use Illuminate\Http\Request;

class ProductSupplierController extends Controller
{
    public function index()
    {
        $relations = ProductSupplier::with(['product', 'supplier'])->get();
        return view('product_suppliers.index', compact('relations'));
    }

    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('product_suppliers.create', compact('products', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        ProductSupplier::create($request->all());
        return redirect()->route('product_suppliers.index')->with('success', 'Relasi produk-supplier berhasil ditambahkan.');
    }

    public function destroy(ProductSupplier $productSupplier)
    {
        $productSupplier->delete();
        return redirect()->route('product_suppliers.index')->with('success', 'Relasi berhasil dihapus.');
    }
}
