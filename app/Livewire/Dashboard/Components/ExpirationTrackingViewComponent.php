<?php

namespace App\Livewire\Dashboard\Components;

use Livewire\Component;
use App\Models\department;

class ExpirationTrackingViewComponent extends Component
{
    public $departmentId;

    public function render()
    {
        $department_data = department::where('is_Deleted', 0)->orderBy('name','asc')->get();
        return view('livewire.dashboard.components.expiration-tracking-view-component', compact('department_data'));
    }

    public function updatedDepartmentId($value)
    {
        $this->departmentId = $value;
    }
}
