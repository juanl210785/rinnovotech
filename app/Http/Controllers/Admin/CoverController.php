<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoverController extends Controller
{

    public function index()
    {
        $covers = Cover::paginate(10);
        return view('admin.covers.index', compact('covers'));
    }


    public function create()
    {
        return view('admin.covers.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'start_at' => 'required|date',
            'end_at' => 'nullable|date|after_or_equal:start_at',
            'is_active' => 'required|boolean',
            'image' => 'required|image|max:10240'
        ], [], [
            'title' => 'Título',
            'start_at' => 'Fecha inicio',
            'end_at' => 'Fecha final',
            'is_active' => 'Condición',
            'image' => 'Imagen',
        ]);

        $data['image_path'] = Storage::put('covers', $data['image']);

        $cover = Cover::create($data);

        session()->flash('notification', [
            'clase' => 'text-success',
            'lucide' => 'check-circle',
            'title' => 'Éxito',
            'message' => '¡Portada ha sido creada!'
        ]);

        return redirect()->route('admin.covers.index');
    }


    public function show(Cover $cover)
    {
        //
    }


    public function edit(Cover $cover)
    {
        return view('admin.covers.edit', compact('cover'));
    }


    public function update(Request $request, Cover $cover)
    {
        //
    }


    public function destroy(Cover $cover)
    {
        //
    }
}
