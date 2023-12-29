<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    public function create() {
        return view('product.create');
    }

    public function store(StoreProductRequest $request) {

        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $attr = $request->all();
        $imagePath = $request->file('img')->store('images', 'public');

        $attr['img'] = $imagePath;
        Product::create($attr);

        return redirect()->route('products.index')->with('success', 'Berhasil membuat Produk!');
    }

    public function edit(Product $product) {
        return view('product.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product) {
        $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('img')) {
            Storage::disk('public')->delete($product->img);

            $imagePath = $request->file('img')->store('images', 'public');
        } else {
            $imagePath = $product->img;
        }
        $attr = $request->all();
        // dd($imagePath);
        $attr['img'] = $imagePath;
        $product->update($attr);

        return redirect()->route('products.index')->with('success', 'Berhasil mengubah Produk!');
    }

    public function destroy(Product $product) {
        Storage::delete($product->img);

        $product->delete();

        return redirect('products')->with('success', 'Berhasil menghapus Produk');

    }
}
