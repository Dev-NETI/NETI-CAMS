<?php

namespace App\Livewire\Dashboard\Components;

use Carbon\Carbon;
use App\Models\product;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\WithPagination;

class ExpirationTrackingListComponent extends Component
{
    use WithPagination;
    public $title;
    public $titleColor;
    public $expiredId; //1 expired, 2 - expiring within 1 week , 3 - expiring within 1 month
    #[Reactive]
    public $departmentId;

    public function render()
    {
        switch ($this->expiredId) {
            case 1:
                $query = product::where('expiration', '<', Carbon::now())
                    ->where('department_id', 'LIKE', '%' . $this->departmentId . '%');

                if (auth()->user()->usertype_id != 1) {
                    $query->where('department_id', '=', auth()->user()->department_id);
                }

                $expired_data = $query->orderBy('name', 'asc')->paginate(6);
                break;
            case 2:
                $query = product::where('expiration', '>=', Carbon::now())
                    ->where('expiration', '<=', Carbon::now()->addWeek())
                    ->where('department_id', 'LIKE', '%' . $this->departmentId . '%');

                if (auth()->user()->usertype_id != 1) {
                    $query->where('department_id', '=', auth()->user()->department_id);
                }


                $expired_data = $query->orderBy('name', 'asc')->paginate(6);
                break;
            case 3:
                $query = product::where('expiration', '>=', Carbon::now())
                    ->where('expiration', '<=', Carbon::now()->addMonth())
                    ->where('department_id', 'LIKE', '%' . $this->departmentId . '%');

                if (auth()->user()->usertype_id != 1) {
                    $query->where('department_id', '=', auth()->user()->department_id);
                }


                $expired_data = $query->orderBy('name', 'asc')->paginate(6);
                break;
            default:
                $expired_data = null;
                break;
        }
        return view('livewire.dashboard.components.expiration-tracking-list-component', compact('expired_data'));
    }
}
