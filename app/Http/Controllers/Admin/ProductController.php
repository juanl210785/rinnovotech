<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $pag = $request->get('pag', 10);
        $products = Product::with('subcategory.category.family')->orderBy('id', 'desc')->paginate($pag);
        //return $products;
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //return $product;
        $product->delete();

        session()->flash('notification', [
            'clase' => 'text-success',
            'lucide' => 'check-circle',
            'title' => 'Éxito',
            'message' => '¡Producto ha sido eliminado!'
        ]);

        return redirect()->route('admin.products.index');
    }

    public function changeStatus(Product $product)
    {
        if ($product->status == Product::ACTIVE) {
            $product->update([
                'status' => Product::INACTIVE
            ]);
        } else {
            $product->update([
                'status' => Product::ACTIVE
            ]);
        }

        session()->flash('notification', [
            'clase' => 'text-success',
            'lucide' => 'check-circle',
            'title' => 'Éxito',
            'message' => '¡Estado ha sido actualizado!'
        ]);

        return redirect()->route('admin.products.index');
    }
}
