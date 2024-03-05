<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use App\Models\department;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoriesComponent extends Component
{
    use WithPagination;
    use AuthorizesRequests;
    public $search;

    public function mount()
    {
        Gate::authorize('AuthorizeRolePolicy', 6);
    }

    public function render()
    {
        if(auth()->user()->usertype_id == 2){
            $category_data = Category::where('Is_Deleted', '=' , '0')
                                       ->where('department_id' , '=' , auth()->user()->department_id)
                                       ->where(function ($query){
                                                        $query->where('name' , 'LIKE' , '%'.$this->search.'%') 
                                                            ->orWhere('description' , 'LIKE' , '%'.$this->search.'%')
                                                            ->orWhereHas('department' , function ($query2){
                                                                        $query2->where('name' , 'LIKE' , '%'.$this->search.'%');
                                                            });
                                                })
                                       ->orderBy('name', 'asc')
                                       ->paginate(10);
        }else{
            $category_data = Category::where('Is_Deleted', '=' , '0')
                             ->where(function ($query){
                                    $query->where('name' , 'LIKE' , '%'.$this->search.'%') 
                                          ->orWhere('description' , 'LIKE' , '%'.$this->search.'%')
                                          ->orWhereHas('department' , function ($query2){
                                                    $query2->where('name' , 'LIKE' , '%'.$this->search.'%');
                                          });
                             })
                             ->orderBy('name', 'asc')->paginate(10);
        }
        
        
        return view('livewire.categories.categories-component' , [
            'category_data' => $category_data
        ])->layout('layouts.app');
    }

    public function new()
    {
        if(auth()->user()->usertype_id == 2){
            $department_data = department::where('id' , '=' , auth()->user()->department_id)->orderBy('name' , 'asc')->get();
        }else{
            $department_data = department::all();
        }
        

        return view('livewire.categories.categories-new', [
            'department_data' => $department_data
        ]);
    }

    public function create(CategoriesRequest $request)
    {
        Gate::authorize('AuthorizeRolePolicy', 15);
        try {
            $data = [
                'name' => $request->name , 
                'description' => $request->description , 
                'department_id' => $request->department_id
            ];
    
            Category::create($data);
            $request->session()->flash('alert-success' , 'Category created!');
        } catch (\Exception $e) {
            $request->session()->flash('alert-danger' , $e->getMessage());
        }
        return redirect()->route('categories.index');
    }

    public function destroy($category_id)
    {
        Gate::authorize('AuthorizeRolePolicy', 17);
        try {
            $category_data = Category::find($category_id);

            if($category_data){
                $category_data->update([
                    "Is_Deleted" => 1
                ]);
                session()->flash('alert-success' , 'Category deleted!');
            }
            else{
                session()->flash('alert-danger' , 'Category do not exist!');
            }
        } catch (\Exception $e) {
                session()->flash('alert-danger' , $e->getMessage());
        }
    }

    public function edit($id)
    {
        $category_data = Category::find($id);
        if(auth()->user()->usertype_id == 2){
            $department_data = department::where('id' , '=' , auth()->user()->department_id)->orderBy('name' , 'asc')->get();
        }else{
            $department_data = department::all();
        }

        return view('livewire.categories.categories-new', compact('category_data' , 'department_data'));
    }

    public function update(CategoriesRequest $request)
    {
        Gate::authorize('AuthorizeRolePolicy', 16);
        try {
            $category_data = Category::find($request->category_id);

            if($category_data){
                    $category_data->update([
                        'name' => $request->name , 
                        'description' => $request->description , 
                        'department_id' => $request->department_id
                    ]);

                    session()->flash('alert-success' , 'Category Updated!');
            }
            else{
                    session()->flash('alert-danger' , 'Category do not exist!');
            }
        } catch (\Exception $e) {
                    session()->flash('alert-danger' , $e->getMessage());
        }
        return redirect()->route('categories.index');
    }

}
