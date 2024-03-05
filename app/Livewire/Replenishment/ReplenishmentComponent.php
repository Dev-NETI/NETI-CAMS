<?php

namespace App\Livewire\Replenishment;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Replenishment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ReplenishmentComponent extends Component
{
    use WithPagination;
    use AuthorizesRequests;
    public $search; 

    public function mount()
    {
        Gate::authorize('AuthorizeRolePolicy', 3);
    }

    public function render()
    {
        if(auth()->user()->usertype_id == 2){

            $replenishment_data = Replenishment::whereHas('product', function ($query) {
                                                    $query->where('department_id', '=', auth()->user()->department_id);
                                                })
                                                ->where(function ($query){
                                                    $query->where('description' , 'LIKE' , '%'.$this->search.'%')
                                                        ->orWhere('DataModifier' , 'LIKE' , '%'.$this->search.'%')
                                                        ->orWhereHas('product' , function($query2){
                                                                $query2->where('name' , 'LIKE' , '%'.$this->search.'%');
                                                        });
                                                })
                                                ->orderBy('created_at', 'desc')
                                                ->paginate(10);

            
        }else{
            $replenishment_data = Replenishment::where(function ($query){
                                                    $query->where('description' , 'LIKE' , '%'.$this->search.'%')
                                                        ->orWhere('DataModifier' , 'LIKE' , '%'.$this->search.'%')
                                                        ->orWhereHas('product' , function($query2){
                                                                $query2->where('name' , 'LIKE' , '%'.$this->search.'%');
                                                        });
                                                })
                                                ->orderBy('created_at', 'desc')
                                                ->paginate(10);
        }

        
        return view('livewire.replenishment.replenishment-component' , [
            'replenishment_data' => $replenishment_data
        ])->layout('layouts.app');
    }
}
