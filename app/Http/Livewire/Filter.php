<?php

namespace App\Http\Livewire;

use App\Models\Option;
use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Filter extends Component
{
    use WithPagination;

    public $family_id, $category_id, $subcategory_id;

    public $options, $selected_features = [], $orderBy = 1, $search;

    protected $listeners = ['search' => 'filtrarProductos'];

    public function mount()
    {
        $this->options = Option::verifyFamily($this->family_id)
            ->verifyCategory($this->category_id)
            ->verifySubcategory($this->subcategory_id)
            ->get()
            ->toArray();
    }

    public function filtrarProductos($data)
    {
        $this->search = $data;
    }

    public function render(Request $request)
    {
        $pag = $request->get('pag', 10);

        $products = Product::verifyFamily($this->family_id)
            ->verifyCategory($this->category_id)
            ->verifySubcategory($this->subcategory_id)
            ->customOrder($this->orderBy)
            ->selectedFeatures($this->selected_features)
            ->customSearch($this->search)
            ->paginate($pag);

        return view('livewire.filter', compact('products'));
    }
}
