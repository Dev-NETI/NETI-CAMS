<?php

namespace App\Livewire\Dashboard\Components;

use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;

class StatusMonitoringViewComponent extends Component
{
    public function render()
    {
        return view('livewire.dashboard.components.status-monitoring-view-component');
    }
}
