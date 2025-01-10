<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Family;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsEdit extends Component
{

    use WithFileUploads;

    public $product;
    public $families;
    public $family_id = '';
    public $category_id = '';
    public $image;

    public $productEdit;

    public function mount($product)
    {
        $this->productEdit = $product->only('id', 'sku', 'name', 'description', 'image_path', 'price', 'status', 'condition', 'stock', 'subcategory_id');

        $this->families = Family::all();

        $this->family_id = $product->subcategory->category->family->id;

        $this->category_id = $product->subcategory->category->id;
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
        $this->productEdit['status'] = $this->productEdit['status'] ? 'Activo' : 'Inactivo';
        $this->validate([
            'image' => 'nullable|image|max:10240',
            'productEdit.sku' => 'required|unique:products,sku, ' . $this->productEdit['id'],
            'productEdit.name' => 'required|unique:products,name, ' . $this->productEdit['id'],
            'productEdit.description' => 'nullable|max:2000',
            'productEdit.price' => 'required|numeric|min:0|max:9999999.99|regex:/^\d+(\.\d{1,2})?$/',
            'productEdit.status' => 'required',
            'productEdit.condition' => 'required',
            'productEdit.stock' => 'required|integer|min:0',
            'productEdit.subcategory_id' => 'required|exists:subcategories,id',
            'family_id' => 'required|exists:families,id',
            'category_id' => 'required|exists:categories,id'
        ], [], [
            'image' => 'Imagen',
            'productEdit.sku' => 'SKU',
            'productEdit.name' => 'Nombre',
            'productEdit.description' => 'Descripción',
            'productEdit.price' => 'Precio',
            'productEdit.status' => 'Estado',
            'productEdit.condition' => 'Condición',
            'productEdit.stock' => 'Inventario',
            'productEdit.subcategory_id' => 'Subcategoría',
        ]);

        //Procesar y guardar la imagen aquí // Por ejemplo,

        if ($this->image) {
            Storage::delete($this->productEdit['image_path']);
            $route_image = $this->image->store('products');

            $producto = $this->product->update($this->productEdit);

            if ($producto) {
                session()->flash('notification', [
                    'clase' => 'text-success',
                    'lucide' => 'check-circle',
                    'title' => 'Éxito',
                    'message' => '¡Producto ha sido actualizado!'
                ]);
            } else {
                session()->flash('notification', [
                    'clase' => 'text-danger',
                    'lucide' => 'x-circle',
                    'title' => 'Error',
                    'message' => '¡Producto no ha sido actualizado!'
                ]);
            }
        } else {
            session()->flash('notification', [
                'clase' => 'text-danger',
                'lucide' => 'x-circle',
                'title' => 'Error',
                'message' => '¡Producto no ha sido actualizado!'
            ]);
        }

        return redirect()->route('admin.products.edit', $this->product);
    }

    public function render()
    {
        return view('livewire.admin.products.products-edit');
    }
}
