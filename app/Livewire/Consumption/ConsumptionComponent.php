<?php

namespace App\Livewire\Consumption;

use Livewire\Component;
use App\Models\Consumption;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Exports\ConsumptionExport;
use Maatwebsite\Excel\Facades\Excel;

class ConsumptionComponent extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public $search;
    public $startDate;
    public $endDate;
    protected $listeners = ['date-updated' => 'refreshData'];

    public function mount()
    {
        Gate::authorize('AuthorizeRolePolicy', 4);
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
        $filename = 'consumption_logs_' . date('Y-m-d_H-i-s') . '.xlsx';

        return Excel::download(
            new ConsumptionExport($this->search, $this->startDate, $this->endDate),
            $filename
        );
    }

    public function render()
    {
        if (auth()->user()->usertype_id == 2) {
            $query = Consumption::whereHas('product', function ($query) {
                $query->where('department_id', '=', auth()->user()->department_id);
            });
        } else {
            $query = Consumption::query();
        }

        // Apply search filter
        if (!empty($this->search)) {
            $query->where(function ($query) {
                $query->where('purpose', 'LIKE', '%' . $this->search . '%')
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

        $consumption_data = $query->orderBy('created_at', 'desc')->paginate(6);

        return view('livewire.consumption.consumption-component', [
            'consumption_data' => $consumption_data
        ])->layout('layouts.app');
    }
}
