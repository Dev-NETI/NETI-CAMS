<?php

namespace App\Livewire\Dashboard\Components;

use Livewire\Component;

class InventoryLevelItemsComponent extends Component
{
    public $category;
    public function render()
    {
        return view('livewire.dashboard.components.inventory-level-items-component');
    }
}
