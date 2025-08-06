<?php

namespace App\Livewire\Replenishment;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Replenishment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Exports\ReplenishmentExport;
use Maatwebsite\Excel\Facades\Excel;

class ReplenishmentComponent extends Component
{
    use WithPagination;
    use AuthorizesRequests;
    public $search;
    public $startDate;
    public $endDate;
    protected $listeners = ['date-updated' => 'refreshData'];

    public function mount()
    {
        Gate::authorize('AuthorizeRolePolicy', 3);
    }

    public function refreshData()
    {
        // This will trigger a re-render with updated data
        $this->resetPage(); // Optional: Reset pagination if needed
    }

    public function searchData()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->reset(['search', 'startDate', 'endDate']);
        $this->resetPage();
    }

    public function exportToExcel()
    {
        $filename = 'replenishment_logs_' . date('Y-m-d_H-i-s') . '.xlsx';

        return Excel::download(
            new ReplenishmentExport($this->search, $this->startDate, $this->endDate),
            $filename
        );
    }

    public function render()
    {
        if (auth()->user()->usertype_id == 2) {
            $query = Replenishment::whereHas('product', function ($query) {
                $query->where('department_id', '=', auth()->user()->department_id);
            });
        } else {
            $query = Replenishment::query();
        }

        // Apply search filter
        if (!empty($this->search)) {
            $query->where(function ($query) {
                $query->where('description', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('DataModifier', 'LIKE', '%' . $this->search . '%')
                    ->orWhereHas('product', function ($query2) {
                        $query2->where('name', 'LIKE', '%' . $this->search . '%');
                    });
            });
        }

        // Apply date filters
        if (!empty($this->startDate)) {
            $query->whereDate('created_at', '>=', $this->startDate);
        }

        if (!empty($this->endDate)) {
            $query->whereDate('created_at', '<=', $this->endDate);
        }

        $replenishment_data = $query->orderBy('created_at', 'desc')->paginate(7);

        return view('livewire.replenishment.replenishment-component', [
            'replenishment_data' => $replenishment_data
        ])->layout('layouts.app');
    }
}
