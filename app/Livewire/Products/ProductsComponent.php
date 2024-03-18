<?php

namespace App\Livewire\Products;

use App\Http\Requests\ProductsRequest;
use App\Models\Category;
use App\Models\Consumption;
use App\Models\department;
use App\Models\product;
use App\Models\Replenishment;
use App\Models\supplier;
use App\Models\unit;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsComponent extends Component
{
    use WithPagination;
    use AuthorizesRequests;
    public $product_name;
    public $product_id;
    public $quantity;
    public $purpose;
    public $unit;
    public $max_quantity;
    public $description;
    public $search;
    public $department;
    public $department_id;
    public $category;
    public $category_id;

    public function mount()
    {
        Gate::authorize('AuthorizeRolePolicy', 1);
    }

    public function render()
    {
        if (auth()->user()->usertype_id == 2) {
            $product_data = product::where('department_id', '=', auth()->user()->department_id)
                                    ->Where('name', 'LIKE', '%' . $this->search . '%')
                                    ->Where('category_id', 'LIKE', '%' . $this->category_id . '%')
                                    ->Where('is_active', true)
                                    ->orderBy('name', 'asc')
                                    ->paginate(10);
            $category_data = Category::where('department_id', auth()->user()->department_id)->orderBy('name', 'asc')->get();
        } else {
            $product_data = product::where('department_id', 'LIKE', '%' . $this->department_id. '%')
                                    ->Where('name', 'LIKE', '%' . $this->search . '%')
                                    ->Where('category_id', 'LIKE', '%' . $this->category_id . '%')
                                    ->Where('is_active', true)
                                    ->orderBy('name', 'asc')
                                    ->paginate(10);
            $category_data = Category::where('department_id', $this->department_id)->orderBy('name', 'asc')->get();
        }

        $department_data = department::all();

        return view('livewire.products.products-component', [
            'product_data' => $product_data,
            'department_data' => $department_data,
            'category_data' => $category_data
        ])->layout('layouts.app');
    }

    public function updatedDepartment($value)
    {
        $this->department_id = $value;
    }

    public function updatedCategory($value)
    {
        $this->category_id = $value;
    }

    public function new()
    {
        if (auth()->user()->usertype_id == 2) {
            $department_data = department::where('Is_Deleted', '=', 0)->where('id', '=', auth()->user()->department_id)->get();
            $category_data = Category::where('Is_Deleted', '=', 0)->where('department_id', '=', auth()->user()->department_id)->get();
            $supplier_data = supplier::where('Is_Deleted', '=', 0)->where('department_id', '=', auth()->user()->department_id)->get();
        } else {
            $department_data = department::where('Is_Deleted', '=', 0)->get();
            $category_data = Category::where('Is_Deleted', '=', 0)->get();
            $supplier_data = supplier::where('Is_Deleted', '=', 0)->get();
        }

        $unit_data = unit::where('is_active', 1)->orderBy('name', 'asc')->get();

        return view(
            'livewire.products.products-new',
            compact('department_data', 'category_data', 'supplier_data', 'unit_data')
        );
    }

    public function create(ProductsRequest $request)
    {
        Gate::authorize('AuthorizeRolePolicy', 11);
        try {
            $currentUser = auth()->user()->name;

            product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'unit_id' => $request->unit_id,
                'manufacturer' => $request->manufacturer,
                'department_id' => $request->department_id,
                'category_id' => $request->category_id,
                'supplier_id' => $request->supplier_id,
                'low_stock_level' => $request->low_stock_level,
                'LastModifiedBy' => $currentUser,
                'expiration' => $request->expiration,
                'remarks' => $request->remarks
            ]);
            session()->flash('alert-success', 'Product created successfully!');
        } catch (\Exception $e) {
            session()->flash('alert-danger', $e->getMessage());
        }
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product_data = product::find($id);
        $unit_data = unit::where('is_active', 1)->orderBy('name', 'asc')->get();

        if (auth()->user()->usertype_id == 2) {
            $department_data = department::where('Is_Deleted', '=', 0)->where('id', '=', auth()->user()->department_id)->get();
            $category_data = Category::where('Is_Deleted', '=', 0)->where('department_id', '=', auth()->user()->department_id)->get();
            $supplier_data = supplier::where('Is_Deleted', '=', 0)->where('department_id', '=', auth()->user()->department_id)->get();
        } else {
            $department_data = department::where('Is_Deleted', '=', 0)->get();
            $category_data = Category::where('Is_Deleted', '=', 0)->get();
            $supplier_data = supplier::where('Is_Deleted', '=', 0)->get();
        }

        return view(
            'livewire.products.products-new',
            compact('department_data', 'category_data', 'supplier_data', 'unit_data', 'product_data')
        );
    }

    public function update(ProductsRequest $request)
    {
        Gate::authorize('AuthorizeRolePolicy', 12);
        try {
            $product_data = product::find($request->product_id);

            if ($product_data) {
                $product_data->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'price' => $request->price,
                    'unit_id' => $request->unit_id,
                    'manufacturer' => $request->manufacturer,
                    'department_id' => $request->department_id,
                    'category_id' => $request->category_id,
                    'supplier_id' => $request->supplier_id,
                    'low_stock_level' => $request->low_stock_level,
                    'quantity' => $request->quantity,
                    'LastModifiedBy' => auth()->user()->name,
                    'expiration' => $request->expiration,
                    'remarks' => $request->remarks
                ]);
                session()->flash('alert-success', 'Inventory updated successfully!');
            } else {
                session()->flash('alert-danger', 'Item do not exist!');
            }
        } catch (\Exception $e) {
            session()->flash('alert-danger', $e->getMessage());
        }
        return redirect()->route('products.index');
    }

    public function getItem($id)
    {
        $product_data = product::find($id);
        if ($product_data) {
            $this->product_name = $product_data->name;
            $this->product_id = $product_data->id;
            $this->unit = $product_data->unit->name;
            $this->max_quantity = $product_data->quantity;
        } else {
            session()->flash('alert-danger', 'Item do not exist!');
        }
    }

    public function Consumption()
    {
        Gate::authorize('AuthorizeRolePolicy', 13);
        try {
            $this->validate([
                'quantity' => 'numeric|required|min:1',
                'purpose' => 'required|min:5|max:4000'
            ]);


            $product_data = product::find($this->product_id);
            if ($product_data) {

                //update new item quantity
                $product_data->update([
                    'quantity' => $product_data->quantity - $this->quantity
                ]);

                // record consumption log
                Consumption::create([
                    'product_id' => $this->product_id,
                    'quantity' => $this->quantity,
                    'purpose' => $this->purpose,
                    'DataModifier' => auth()->user()->name
                ]);

                session()->flash('alert-success', 'Consumption transaction complete!');
            } else {
                session()->flash('alert-danger', 'Item do not exist!');
            }
        } catch (\Exception $e) {
            session()->flash('alert-danger', $e->getMessage());
        }
        return redirect()->route('products.index');
    }

    public function Replenishment()
    {
        Gate::authorize('AuthorizeRolePolicy', 14);
        try {
            $validated = $this->validate([
                'quantity' => 'required|min:1',
                'description' => 'required|min:5|max:2000'
            ]);

            $product_data = product::find($this->product_id);

            if ($product_data) {

                $product_data->update([
                    'quantity' => $product_data->quantity + $this->quantity,
                    'LastModifiedBy' => auth()->user()->name
                ]);

                Replenishment::create([
                    'product_id' => $this->product_id,
                    'quantity' => $this->quantity,
                    'description' => $this->description,
                    'DataModifier' => auth()->user()->name
                ]);

                session()->flash('alert-success', 'Replenishment successful!');
            } else {
                session()->flash('alert-danger', 'Item do not exist!');
            }
        } catch (\Exception $e) {
            session()->flash('alert-danger', $e->getMessage());
        }
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        Gate::authorize('AuthorizeRolePolicy', 27);
        $product = product::find($id);
        try {
            $update = $product->update([
                'is_active' => false
            ]);
            if(!$update){
                session()->flash('alert-danger', 'Failed to delete product!');
            }
            session()->flash('alert-success', 'Product deleted successfully!');
        } catch (\Exception $e) {
            session()->flash('alert-danger', $e->getMessage());
        }
    }

}
