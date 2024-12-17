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

        session()->flash('notification', [
            'clase' => 'text-dander',
            'lucide' => 'x-circle',
            'title' => 'Error',
            'message' => '¡Producto no ha sido creado!'
        ]);

        return redirect()->route('admin.products.create');

        //dd($this->product);
        /* if ($this->image) {
            $extension = $this->image->getClientOriginalExtension();
            $mimeType = $this->image->getClientMimeType();

            // Normalizar el tipo MIME basado en la extensión
            $validMimeTypes = [
                'jpg' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'png' => 'image/png'
            ];

            if (array_key_exists($extension, $validMimeTypes)) {
                $mimeType = $validMimeTypes[$extension];
            }

            // Realizar la validación manual del tipo MIME
            if (!in_array($mimeType, $validMimeTypes)) {
                session()->flash('error', 'El archivo subido no es una imagen válida.');
                return;
            }

            // Continuar con la validación de Laravel
            $this->validate([
                'image' => 'required|max:10240',
                'product.sku' => 'required|unique:products,sku',
                'product.name' => 'required|unique:products,name',
                'product.description' => 'required|max:2000',
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

            // Procesar y guardar la imagen aquí
            // Por ejemplo, $this->image->store('images');
            session()->flash('message', 'Imagen subida con éxito.');
            redirect()->route('admin.products.create');
        } else {
            $this->validate([
                'image' => 'required|max:10240',
                'product.sku' => 'required|unique:products,sku',
                'product.name' => 'required|unique:products,name',
                'product.description' => 'required|max:2000',
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
        } */
    }


    /*public function save()
    {

        /* if ($this->image) {
            $mimeType = $this->image->getClientMimeType();
            // Normalizar el tipo MIME 
            $validMimeTypes = ['image/jpeg', 'image/png'];
            if (!in_array($mimeType, $validMimeTypes)) {
                // Forzar tipo MIME basado en la extensión si es necesario 
                $extension = $this->image->getClientOriginalExtension();
                switch ($extension) {
                    case 'jpg':
                    case 'jpeg':
                        $mimeType = 'image/jpeg';
                        break;
                    case 'png':
                        $mimeType = 'image/png';
                        break;
                }
            }
            // Continuar con la validación usando el tipo MIME normalizado 
            $this->validate([
                'image' => 'required|mimes:jpg,jpeg,png|max:10240',
            ], [], [
                'image' => 'Imagen',
            ]);
            //Procesar y guardar la imagen aquí // Por ejemplo, 
            $this->image->store('images'); 
            session()->flash('message', 'Imagen subida con éxito.'); 
        } */

    //$this->product['status'] = $this->product['status'] ? 'Activo' : 'Inactivo';
    //dd($this->product);
    //'product.image_path' => 'required|mimes:jpg,jpeg,png,gif',
    //'product.image_path' => 'Imagen',
    /* if ($this->image) {
            dd($this->image->getClientMimeType(), $this->image->getSize());
        } */

    /* 'product.sku' => 'required|unique:products,sku',
            'product.name' => 'required|unique:products,name',
            'product.description' => 'required|max:2000',
            'product.price' => 'required|numeric|min:0|max:9999999.99|regex:/^\d+(\.\d{1,2})?$/',
            'product.status' => 'required',
            'product.condition' => 'required',
            'product.stock' => 'required|integer|min:0',
            'product.subcategory_id' => 'required|exists:subcategories,id',
            'family_id' => 'required|exists:families,id',
            'category_id' => 'required|exists:categories,id' */

    /* 'product.sku' => 'SKU',
            'product.name' => 'Nombre',
            'product.description' => 'Descripción',
            'product.price' => 'Precio',
            'product.status' => 'Estado',
            'product.condition' => 'Condición',
            'product.stock' => 'Inventario',
            'product.subcategory_id' => 'Subcategoría', */

    /* if ($this->image) {
                $mimeType = $this->image->getClientMimeType();
                $size = $this->image->getSize();
                $extension = $this->image->getClientOriginalExtension();
                dd($mimeType, $size, $extension, $this->image);
            } */

    /* $validationData = $this->validate([
            'image' => 'required|mimes:jpg,jpeg,png|max:10240',
        ], [], [
            'image' => 'Imagen',
        ]); */

    //dd($this->product);
    /* }*/

    public function render()
    {
        return view('livewire.admin.products.products-create')->with('flashMessage', session('message'));
    }
}
