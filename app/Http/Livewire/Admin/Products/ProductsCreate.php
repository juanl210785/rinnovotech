<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Family;
use App\Models\Product;
use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsCreate extends Component
{
    use WithFileUploads;

    public $families;
    public $family_id = '';
    public $category_id = '';
    public $image;
    public $product = [
        'sku' => '',
        'name' => '',
        'description' => '',
        'image_path' => '',
        'price' => '',
        'status' => '',
        'condition' => '',
        'stock' => '',
        'subcategory_id' => '',
    ];

    public function mount()
    {
        $this->families = Family::all();
    }

    //Ciclo de vida del componente, actualizar
    public function updatedFamilyId()
    {
        $this->category_id = '';
    }

    public function updatedCategoryId()
    {
        $this->product['subcategory_id'] = '';
    }

    public function getCategoriesProperty()
    {
        return Category::where('family_id', $this->family_id)->get();
    }

    public function getSubcategoriesProperty()
    {
        return Subcategory::where('category_id', $this->category_id)->get();
    }

    public function removeImage()
    {
        $this->image = null;
    }

    public function save()
    {
        $this->product['status'] = $this->product['status'] ? 'Activo' : 'Inactivo';
        $this->validate([
            'image' => 'required|image|max:10240',
            'product.sku' => 'required|unique:products,sku',
            'product.name' => 'required|unique:products,name',
            'product.description' => 'nullable|max:2000',
            'product.price' => 'required|numeric|min:0|max:9999999.99|regex:/^\d+(\.\d{1,2})?$/',
            'product.status' => 'required',
            'product.condition' => 'required',
            'product.stock' => 'required|integer|min:0',
            'product.subcategory_id' => 'required|exists:subcategories,id',
            'family_id' => 'required|exists:families,id',
            'category_id' => 'required|exists:categories,id'
        ], [], [
            'image' => 'Imagen',
            'product.sku' => 'SKU',
            'product.name' => 'Nombre',
            'product.description' => 'Descripción',
            'product.price' => 'Precio',
            'product.status' => 'Estado',
            'product.condition' => 'Condición',
            'product.stock' => 'Inventario',
            'product.subcategory_id' => 'Subcategoría',
        ]);

        //Procesar y guardar la imagen aquí // Por ejemplo, 
        $route_image = $this->image->store('products');

        if ($route_image) {
            $this->product['image_path'] = $route_image;

            $product = Product::create($this->product);

            if ($product) {
                session()->flash('notification', [
                    'clase' => 'text-success',
                    'lucide' => 'check-circle',
                    'title' => 'Éxito',
                    'message' => '¡Producto ha sido creado!'
                ]);
            } else {
                session()->flash('notification', [
                    'clase' => 'text-danger',
                    'lucide' => 'x-circle',
                    'title' => 'Error',
                    'message' => '¡Producto no ha sido creado!'
                ]);
            }
        } else {
            session()->flash('notification', [
                'clase' => 'text-danger',
                'lucide' => 'x-circle',
                'title' => 'Error',
                'message' => '¡Producto no ha sido creado!'
            ]);
        }

        return redirect()->route('admin.products.create');
    }



    public function render()
    {
        return view('livewire.admin.products.products-create')->with('flashMessage', session('message'));
    }
}
