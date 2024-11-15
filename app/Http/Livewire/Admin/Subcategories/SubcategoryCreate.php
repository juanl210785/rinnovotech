<?php

namespace App\Http\Livewire\Admin\Subcategories;

use App\Models\Category;
use App\Models\Family;
use App\Models\Subcategory;
use Livewire\Component;

class SubcategoryCreate extends Component
{
    public $families;

    public $subcategory = [
        'family_id' => '',
        'category_id' => '',
        'name' => ''
    ];

    public function mount()
    {
        $this->families = Family::all();
    }

    //Ciclo de vida del componente, actualizar
    public function updatedSubcategoryFamilyId()
    {
        $this->subcategory['category_id'] = '';
    }

    //Propiedad computada
    public function getCategoriesProperty()
    {
        return Category::where('family_id', $this->subcategory['family_id'])->get();
    }

    //metodo save

    public function save()
    {
        $this->validate([
            'subcategory.family_id' => 'required|exists:families,id',
            'subcategory.category_id' => 'required|exists:categories,id',
            'subcategory.name' => 'required',
        ], [], [
            'subcategory.family_id' => 'Familia',
            'subcategory.category_id' => 'Categoría',
            'subcategory.name' => 'Nombre',
        ]);

        Subcategory::create($this->subcategory);

        return redirect()->route('admin.subcategories.index');
    }


    public function render()
    {
        return view('livewire.admin.subcategories.subcategory-create');
    }
}
