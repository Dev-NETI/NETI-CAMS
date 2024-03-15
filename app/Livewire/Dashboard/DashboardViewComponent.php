<?php

namespace App\Livewire\Dashboard;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class DashboardViewComponent extends Component
{
    use AuthorizesRequests;

    public function mount()
    {
        Gate::authorize('AuthorizeRolePolicy', 28);
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard-view-component')->layout('layouts.app');
    }
}
