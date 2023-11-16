<?php

namespace App\Livewire\Roles;

use App\Models\Roles;
use Livewire\Component;

class RolesComponent extends Component
{
    public $name;
    public $role_id;

    public function render()
    {
        $roles_data = Roles::orderBy('id' , 'asc')->get();

        return view('livewire.roles.roles-component' , [
            'roles_data' => $roles_data
        ])->layout('layouts.app');
    }

    public function create()
    {
        try {
            $validatedData = $this->validate([
                'name' => 'required|string|max:255'
            ]);

            Roles::create([
                'name' => $this->name
            ]);

            session()->flash('alert-success' , 'Role created!');
        } catch (\Exception $e) {
            session()->flash('alert-danger' , $e->getMessage());
        }
        return redirect()->route('roles.index');
    }

    public function delete($id)
    {
            try {
                $role_data = Roles::find($id);

                if($role_data){
                    $role_data->delete();
                    session()->flash('alert-success' , 'Role deleted successfully!');
                }else{
                    session()->flash('alert-danger' , 'Role data not found!');
                }
            } catch (\Exception $e) {
                    session()->flash('alert-danger' , $e->getMessage());
            }
    }

    public function resetRoleId()
    {
        $this->name = null;
        $this->role_id = null;
    }

    public function edit($id)
    {
        $role_data = Roles::find($id);
        if($role_data){
            $this->name = $role_data->name; 
            $this->role_id = $role_data->id;
        }else{
            session()->flash('alert-danger' , 'Role data not found!');
        }
    }

    public function update()
    {
        try {
            $validatedData = $this->validate([
                'name' => 'required|string|max:255'
            ]);

            $role_data = Roles::find($this->role_id);
            if($role_data){
                $role_data->update([
                    'name' => $this->name
                ]);
                session()->flash('alert-success' , 'Role updated successfully!');
            }else{
                session()->flash('alert-danger' , 'Role data not found!');
            }

            
        } catch (\Exception $e) {
            session()->flash('alert-danger' , $e->getMessage());
        }
        return redirect()->route('roles.index');
    }
    
}
