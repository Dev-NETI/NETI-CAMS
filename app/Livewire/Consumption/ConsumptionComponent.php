<?php

namespace App\Livewire\Consumption;

use Livewire\Component;
use App\Models\Consumption;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ConsumptionComponent extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public $search; 

    public function mount()
    {
        Gate::authorize('AuthorizeRolePolicy', 4);
    }

    public function render()
    {
        if(auth()->user()->usertype_id == 2){
            $consumption_data = Consumption::whereHas('product' , function($query){
                                                $query->where('department_id' , '=' , auth()->user()->department_id);
                                            })
                                            ->where(function ($query){
                                                $query->where('purpose' , 'LIKE' , '%'.$this->search.'%')
                                                    ->orWhere('DataModifier' , 'LIKE' , '%'.$this->search.'%')
                                                    ->orWhereHas('product' , function($query2){
                                                            $query2->where('name' , 'LIKE' , '%'.$this->search.'%');
                                                    });
                                            })
                                            ->orderBy('created_at' , 'desc')
                                            ->paginate(10);
        }else{
            $consumption_data = Consumption::where(function ($query){
                                                $query->where('purpose' , 'LIKE' , '%'.$this->search.'%')
                                                      ->orWhere('DataModifier' , 'LIKE' , '%'.$this->search.'%')
                                                      ->orWhereHas('product' , function($query2){
                                                            $query2->where('name' , 'LIKE' , '%'.$this->search.'%');
                                                      });
                                            })
                                            ->orderBy('created_at' , 'desc')
                                            ->paginate(10);
        }
        

        return view('livewire.consumption.consumption-component' , [
            'consumption_data' => $consumption_data
        ])->layout('layouts.app');
    }
}
