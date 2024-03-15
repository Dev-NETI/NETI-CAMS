<?php

namespace App\Livewire\Dashboard\Components;

use App\Models\Category;
use Livewire\Component;

class InventoryLevelViewComponent extends Component
{
    public function render()
    {
        $category_data = Category::where('department_id', '=', auth()->user()->department_id)
                                  ->orderBy('name', 'asc')
                                  ->get();

        return view('livewire.dashboard.components.inventory-level-view-component', 
                    compact('category_data'));
    }
}
