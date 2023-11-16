<?php

namespace App\Livewire\Department;

use App\Http\Requests\DepartmentRequest;
use App\Models\department;
use Livewire\Component;
use Livewire\WithPagination;

class DepartmentComponent extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        $department_data = department::where('Is_Deleted' , '=' , '0')
                                      ->where(function ($query) {
                                                $query->where('name' , 'LIKE' , '%'.$this->search.'%')
                                                      ->orWhere('description' , 'LIKE' , '%'.$this->search.'%');
                                      })
                                      ->paginate(5);

        return view('livewire.department.department-component' , [
            'department_data' => $department_data
        ])->layout('layouts.app');
    }

    public function new()
    {
        return view('livewire.department.department-new');
    }

    public function create(DepartmentRequest $request)
    {
        try {
            department::create([
                'name' => $request->name , 
                'description' => $request->description
            ]);

            session()->flash('alert-success' , 'Department created successfully!');
        } catch (\Exception $e) {
            session()->flash('alert-danger' , $e->getMessage());
        }

        return redirect()->route('department.index');
    }

    public function destroy($id)
    {
        try {
            $department_data = department::find($id);

            if($department_data){
                $department_data->update([
                    'Is_Deleted' => 1
                ]);
                session()->flash('alert-success' , 'Department marked as deleted!');
            }else{
                session()->flash('alert-danger' , 'Department do not exist!');
            }
        } catch (\Exception $e) {
                session()->flash('alert-danger' , $e->getMessage());
        }
    }

    public function edit($id)
    {
        $department_data = department::find($id);
        
        return view('livewire.department.department-new' , compact('department_data'));
    }

    public function update(DepartmentRequest $request)
    {
        try {
            $department_data = department::find($request->department_id);

            if($department_data){
                    $department_data->update([
                        'name' => $request->name , 
                        'description' => $request->description
                    ]);
                    session()->flash('alert-success' , 'Department updated successfully!');
            }else{
                    session()->flash('alert-danger' , 'Department do not exist!');
            }
        } catch (\Exception $e) {
                    session()->flash('alert-danger' , $e->getMessage());
        }

        return redirect()->route('department.index');
    }

}
