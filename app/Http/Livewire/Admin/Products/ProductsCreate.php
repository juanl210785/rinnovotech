<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Family;
use App\Models\Subcategory;
use Livewire\Component;

class ProductsCreate extends Component
{
    public $families;

    public $family_id = '';

    public $category_id = '';

    public $product = [
        'sku' => '',
        'name' => '',
        'description' => '',
        'image_path' => '',
        'price' => '',
        'status' => '',
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

    public function render()
    {
        return view('livewire.admin.products.products-create');
    }
}
