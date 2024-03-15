<?php

namespace App\Livewire\Dashboard\Components;

use Carbon\Carbon;
use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;

class ExpirationTrackingListComponent extends Component
{
    use WithPagination;
    public $title;
    public $titleColor;
    public $expiredId; //1 expired, 2 - expiring within 1 week , 3 - expiring within 1 month

    public function render()
    {
        switch ($this->expiredId) {
            case 1:
                $expired_data = product::where('expiration', '<', Carbon::now())->paginate(6);
                break;
            case 2:
                $expired_data = product::where('expiration', '>=', Carbon::now())
                    ->where('expiration', '<=', Carbon::now()->addWeek())
                    ->paginate(6);
                break;
            case 3:
                $expired_data = product::where('expiration', '>=', Carbon::now())
                    ->where('expiration', '<=', Carbon::now()->addMonth())
                    ->paginate(6);
                break;
            default:
                $expired_data = null;
                break;
        }
        return view('livewire.dashboard.components.expiration-tracking-list-component', compact('expired_data'));
    }
}
