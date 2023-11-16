<?php

namespace App\Livewire\Suppliers;

use App\Http\Requests\SupplierRequest;
use App\Models\department;
use App\Models\supplier;
use Livewire\Component;
use Livewire\WithPagination;

class SupplierComponent extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        if(auth()->user()->usertype_id == 2 ){
            $supplier_data = supplier::where("Is_Deleted" , "=" , "0")
                                       ->where('department_id' , '=' ,auth()->user()->department_id)
                                       ->where(function ($query){
                                                        $query->where('name' , 'LIKE' , '%'.$this->search.'%')
                                                            ->orWhere('contact_person' , 'LIKE' , '%'.$this->search.'%')
                                                            ->orWhere('email' , 'LIKE' , '%'.$this->search.'%')
                                                            ->orWhere('phone' , 'LIKE' , '%'.$this->search.'%')
                                                            ->orWhere('address' , 'LIKE' , '%'.$this->search.'%')
                                                            ->orWhereHas('department' , function ($query2){
                                                                        $query2->where('name' , 'LIKE' , '%'.$this->search.'%');
                                                            });
                                            })
                                       ->orderBy('name' , 'asc')
                                       ->paginate(10);
        }else{
            $supplier_data = supplier::where("Is_Deleted" , "=" , "0")
                                       ->where(function ($query){
                                                $query->where('name' , 'LIKE' , '%'.$this->search.'%')
                                                      ->orWhere('contact_person' , 'LIKE' , '%'.$this->search.'%')
                                                      ->orWhere('email' , 'LIKE' , '%'.$this->search.'%')
                                                      ->orWhere('phone' , 'LIKE' , '%'.$this->search.'%')
                                                      ->orWhere('address' , 'LIKE' , '%'.$this->search.'%')
                                                      ->orWhereHas('department' , function ($query2){
                                                                $query2->where('name' , 'LIKE' , '%'.$this->search.'%');
                                                      });
                                       })
                                       ->orderBy('name' , 'asc')
                                       ->paginate(10);
        }
        

        return view('livewire.suppliers.supplier-component' , [
            'supplier_data' => $supplier_data
        ])->layout('layouts.app');
    }

    public function new()
    {
        if(auth()->user()->usertype_id == 2 ){
            $department_data = department::where('Is_Deleted' , "=" , "0")->where('id' , '=' , auth()->user()->department_id)->orderBy('name' , 'asc')->get();
        }else{
            $department_data = department::where('Is_Deleted' , "=" , "0")->orderBy('name' , 'asc')->get();
        }
        

        return view('livewire.suppliers.supplier-new' , [
            'department_data' => $department_data
        ]);
    }

    public function create(SupplierRequest $request)
    {
            try {
                supplier::create([
                    'name' => $request->name , 
                    'contact_person' => $request->contact_person , 
                    'email' => $request->email , 
                    'phone' => $request->phone , 
                    'address' => $request->address , 
                    'department_id' => $request->department_id
                ]);
    
                session()->flash('alert-success' , 'Supplier saved successfully!');
            } catch (\Exception $e) {
                session()->flash('alert-danger' , $e->getMessage());
            }
            return redirect()->route('supplier.index');
    }

    public function destroy($id)
    {
            try {
                $supplier_data = supplier::find($id);
                if($supplier_data){
                    $supplier_data->update([
                        'Is_Deleted' => 1
                    ]);
                    session()->flash('alert-success' , 'Supplier marked as deleted!');
                }else{
                    session()->flash('alert-danger' , 'Supplier do not exist!');
                }
            } catch (\Exception $e) {
                    session()->flash('alert-danger' , $e->getMessage());
            }
    }

    public function edit($id)
    {
            $supplier_data = supplier::find($id);
            if(auth()->user()->usertype_id == 2 ){
                $department_data = department::where('Is_Deleted' , "=" , "0")->where('id' , '=' , auth()->user()->department_id)->orderBy('name' , 'asc')->get();
            }else{
                $department_data = department::where('Is_Deleted' , "=" , "0")->orderBy('name' , 'asc')->get();
            }
            
            return view('livewire.suppliers.supplier-new' , compact('supplier_data' , 'department_data'));
    }

    public function update(SupplierRequest $request)
    {
            try {
                $supplier_data = supplier::find($request->supplier_id);

                if($supplier_data){
                        $supplier_data->update([
                            'name' => $request->name,
                            'contact_person' => $request->contact_person,
                            'email' => $request->email,
                            'phone' => $request->phone,
                            'address' => $request->address,
                            'department_id' => $request->department_id
                        ]);

                        session()->flash('alert-success' , 'Supplier updated successfully!');
                }else{
                        session()->flash('alert-danger' , 'Supplier do not exist!');
                }
            } catch (\Exception $e) {
                        session()->flash('alert-danger' , $e->getMessage());
            }
            return redirect()->route('supplier.index');
    }

}
