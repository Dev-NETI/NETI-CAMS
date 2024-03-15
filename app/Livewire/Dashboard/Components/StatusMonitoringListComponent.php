<?php

namespace App\Livewire\Dashboard\Components;

use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;

class StatusMonitoringListComponent extends Component
{
    use WithPagination;
    public $title;
    public $titleColor;
    public $statusId; //1 - out of stock , 2- low stock, 3 - on stock

    public function render()
    {
        switch ($this->statusId) {
            case 1:
                $status_data = product::where('quantity', 0)
                    ->where('department_id', auth()->user()->department_id)
                    ->paginate(6);
                break;
            case 2:
                $status_data = product::whereColumn('quantity', '<=', 'low_stock_level')
                    ->where('quantity', '!=', 0)
                    ->where('department_id', auth()->user()->department_id)
                    ->paginate(6);
                break;
            case 3:
                $status_data = product::whereColumn('quantity', '>', 'low_stock_level')
                    ->where('quantity', '!=', 0)
                    ->where('department_id', auth()->user()->department_id)
                    ->paginate(6);

                break;
            default:
                $status_data = null;
                break;
        }




        return view('livewire.dashboard.components.status-monitoring-list-component', compact('status_data'));
    }
}
