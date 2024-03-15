<?php

namespace App\Livewire\Dashboard\Components;

use App\Models\department;
use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;

class StatusMonitoringViewComponent extends Component
{
    public $departmentId;

    public function render()
    {
        $department_data = department::where('is_Deleted', 0)->orderBy('name','asc')->get();
        return view('livewire.dashboard.components.status-monitoring-view-component', compact('department_data'));
    }

    public function updatedDepartmentId($value)
    {
        $this->departmentId = $value;
    }
    
}
