<?php

namespace App\Livewire\Unit;

use Exception;
use App\Models\unit;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Requests\UnitRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\DeleteUnitRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UnitComponent extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public function mount()
    {
        Gate::authorize('AuthorizeRolePolicy', 9);
    }

    public function render()
    {
        $unit_data = unit::where('is_active', 1)->orderBy('name', 'asc')->paginate(5);
        return view('livewire.unit.unit-component', compact('unit_data'))->layout('layouts.app');
    }

    public function create()
    {
        return view('livewire.unit.unit-new');
    }

    public function store(UnitRequest $request)
    {
        Gate::authorize('AuthorizeRolePolicy', 21);
        try {
            $store = unit::create([
                'name' => $request->name,
                'description' => $request->description
            ]);

            if (!$store) {
                session()->flash('alert-danger', 'Saving unit failed!');
            }
            session()->flash('alert-success', 'Unit saved successfully!');
        } catch (Exception $e) {
            session()->flash('alert-danger', $e->getMessage());
        }
        return redirect()->route('unit.index');
    }

    public function edit($id)
    {
        $unit_data = unit::find($id);
        return view('livewire.unit.unit-new', compact('unit_data'));
    }

    public function update(UnitRequest $request)
    {
        Gate::authorize('AuthorizeRolePolicy', 22);
        try {
            $unit_data = unit::find($request->unit_id);

            if ($unit_data) {
                $unit_data->update([
                    'name' => $request->name,
                    'description' => $request->description
                ]);

                session()->flash('alert-success', 'Unit Updated!');
            } else {
                session()->flash('alert-danger', 'Unit do not exist!');
            }
        } catch (Exception $e) {
            session()->flash('alert-danger', $e->getMessage());
        }
        return redirect()->route('unit.index');
    }

    public function destroy(DeleteUnitRequest $request)
    {
        Gate::authorize('AuthorizeRolePolicy', 23);
        try {
            $unit_data = unit::find($request->unit_id);

            if ($unit_data) {
                $unit_data->update([
                    'is_active' => 0,
                ]);

                session()->flash('alert-success', 'Unit Deleted!');
            } else {
                session()->flash('alert-danger', 'Unit do not exist!');
            }
        } catch (Exception $e) {
            session()->flash('alert-danger', $e->getMessage());
        }
        return redirect()->route('unit.index');
    }
}
