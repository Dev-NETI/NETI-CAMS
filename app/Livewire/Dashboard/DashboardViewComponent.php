<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class DashboardViewComponent extends Component
{
    public function render()
    {
        return view('livewire.dashboard.dashboard-view-component')->layout('layouts.app');
    }
}
