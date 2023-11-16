<?php

namespace App\Livewire\UserRoles;

use App\Models\Roles;
use App\Models\User;
use App\Models\User_roles;
use Livewire\Component;

class UserRolesComponent extends Component
{
   
    public $id; // Declare a public property to store the id parameter
    public $selectedRoles = [];

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $user_data = User::find($this->id);
        $roles_data = Roles::all();
        $user_roles = User_roles::where('user_id' , '=' , $this->id)->get();

        return view('livewire.user-roles.user-roles-component' , [
            'user_data' => $user_data , 
            'roles_data' => $roles_data , 
            'user_roles' => $user_roles
        ])->layout('layouts.app');
    }

    public function create()
    {
            try {
                foreach($this->selectedRoles as $selected_role_id)
                {
                        User_roles::create([
                            'user_id' => $this->id , 
                            'role_id' => $selected_role_id
                        ]);
                }
                session()->flash('alert-success' , 'Roles saved!');
            } catch (\Exception $e) {
                session()->flash('alert-danger' , $e->getMessage());
            }
    }

    public function delete($id)
    {
        try {
            $user_roles_data = User_roles::find($id);

            if($user_roles_data){
                $user_roles_data->delete();
                session()->flash('alert-success' , 'Role deleted succesfully!');
            }else{
                session()->flash('alert-danger' , 'Role data not found!');
            }
        } catch (\Exception $e) {
                session()->flash('alert-danger' , $e->getMessage());
        }
    }

}
