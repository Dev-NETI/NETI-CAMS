<?php

namespace App\Livewire\User;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\department;
use App\Models\User;
use App\Models\User_type;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination;
    public $user_id; 
    public $user_name;
    public $password;
    public $search;

    public function render()
    {
        $user_data = User::where(function ($query){
                                $query->where('name' , 'LIKE' , '%'.$this->search.'%')
                                      ->orWhere('email' , 'LIKE' , '%'.$this->search.'%')
                                      ->orWhereHas('department' , function($query2){
                                                $query2->where('name' , 'LIKE' , '%'.$this->search.'%');
                                      })
                                      ->orWhereHas('User_type' , function($query3){
                                                $query3->where('user_type' , 'LIKE' , '%'.$this->search.'%');
                                      });   
                            })
                           ->orderBy('created_at' , 'asc')
                           ->paginate(10);

        return view('livewire.user.user-component' , [
            'user_data' => $user_data
        ])->layout('layouts.app');
    }
    
    public function new()
    {
        $department_data = department::where('Is_Deleted' , '=' , '0')->get();
        $user_type_data = User_type::all();

        return view('livewire.user.user-new' , [
            'department_data' => $department_data , 
            'user_type_data' => $user_type_data 
        ]);
    }
    
    public function generatePassword()
    {
        $passwordLength = 10; // You can adjust the length of the password as needed

        // Generate a password that meets the specified rules
        $password = Str::random($passwordLength);
        $password .= 'A'; // Add an uppercase letter
        $password .= 'a'; // Add a lowercase letter
        $password .= '1'; // Add a numeric digit
        $password .= '@'; // Add a special character

        return response()->json(['password' => $password]);
    }

    public function create(UserRequest $request)
    {
         try {
            User::create([
                'name' => $request->name , 
                'email' => $request->email , 
                'password' => Hash::make($request->password) , 
                'department_id' => $request->department_id , 
                'usertype_id' => $request->usertype_id , 
             ]);
    
             session()->flash('alert-success' , 'User created successfully!');
         } catch (\Exception $e) {
             session()->flash('alert-danger' , $e->getMessage());
         }
         return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $department_data = department::where('Is_Deleted' , '=' , '0')->get();
        $user_type_data = User_type::all();
        $user_data = User::find($id);

        return view('livewire.user.user-new' , [
            'department_data' => $department_data , 
            'user_type_data' => $user_type_data , 
            'user_data' => $user_data
        ]);
    }

    public function update(UpdateUserRequest $request)
    {
        try {
            $user_data = User::find($request->user_id);

            if($user_data){
                    $user_data->update([
                        'name' => $request->name,
                        'email' => $request->email, 
                        'department_id' => $request->department_id, 
                        'usertype_id' => $request->usertype_id
                    ]);

                    session()->flash('alert-success' , 'User updated successfully!');
        }else{
                    session()->flash('alert-danger' , 'User data not found!');
        }
        } catch (\Exception $e) {
                    session()->flash('alert-danger' , $e->getMessage());
        }
        return redirect()->route('user.index');
    }

    public function getUser($id)
    {
        $user_data = User::find($id);
        
        if($user_data){
                $this->user_id = $user_data->id;
                $this->user_name = $user_data->name;
        }else{
                session()->flash('alert-danger' , 'User data not found!');
        }

    }

    public function generateUpdatePassword()
    {
        $passwordLength = 10; // You can adjust the length of the password as needed

        // Generate a password that meets the specified rules
        $password = Str::random($passwordLength);
        $password .= 'A'; // Add an uppercase letter
        $password .= 'a'; // Add a lowercase letter
        $password .= '1'; // Add a numeric digit
        $password .= '@'; // Add a special character

        $this->password = $password;
    }

    public function updatePassword()
    {
            try {
                $validated = $this->validate([
                    'password' => [
                        'required',
                        'string',
                        'min:8',              // Minimum length of 8 characters
                        'regex:/^(?=.*[A-Z])/',  // At least one uppercase letter
                        'regex:/^(?=.*[a-z])/',  // At least one lowercase letter
                        'regex:/^(?=.*\d)/',     // At least one numeric digit
                        'regex:/^(?=.*[@$!%*#?&])/', // At least one special character
                    ]
                ]);
    
                $user_data = User::find($this->user_id);
    
                $user_data->update([
                    'password' => Hash::make($this->password)
                ]);

                session()->flash('alert-success' , 'Password for '.$this->user_name.' updated successfully!');
            } catch (\Exception $e) {
                session()->flash('alert-danger' , $e->getMessage());
            }
            return redirect()->route('user.index');
    }

}
