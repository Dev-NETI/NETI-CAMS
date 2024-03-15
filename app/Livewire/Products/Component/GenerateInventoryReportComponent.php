<?php

namespace App\Livewire\Products\Component;

use App\Models\product;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class GenerateInventoryReportComponent extends Component
{
    public $category;
    public $category_id;

    public function render()
    {
        return view('livewire.products.component.generate-inventory-report-component');
    }

    public function export()
    {
        $category_id = Session::put('categoryId', $this->category_id);
        return redirect()->route('report.inventory');
    }
}
