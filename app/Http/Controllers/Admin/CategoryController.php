<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Family;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('id', 'desc')
            ->with('family')
            ->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    
    public function create()
    {
        $families = Family::all();
        return view('admin.categories.create', compact('families'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'family_id' => 'required|exists:families,id',
            'name' => 'required'
        ]);

        return redirect()->route('admin.categories.index')->with('success', __('Category created successfully'));

        /* Category::create($request->all()); */
        //return response()->json(['success' => true, 'message' => 'Categoría creada exitosamente!']);

        //return back()->with('response', true);
    }

    
    public function show(Category $category)
    {
        //
    }

    
    public function edit(Category $category)
    {
        $families = Family::all();
        return view('admin.categories.edit', compact('category', 'families'));
    }

    
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'family_id' => 'required|exists:families,id',
            'name' => 'required'
        ]);

        $category->update($request->all());

        return response()->json(['success' => true]);
    }

    
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
