<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('category.family')
                                    ->orderBy('id', 'desc')
                                    ->paginate(10);

        return view('admin.subcategories.index', compact('subcategories'));
    }

    
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategories.create', compact('categories'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required'
        ]);

        Subcategory::create($request->all());

        return redirect()->route('admin.subcategories.index');
    }

    
    public function show(Subcategory $subcategory)
    {
        //
    }

    
    public function edit(Subcategory $subcategory)
    {
        //
    }

    
    public function update(Request $request, Subcategory $subcategory)
    {
        //
    }

   
    public function destroy(Subcategory $subcategory)
    {
        //
    }
}
