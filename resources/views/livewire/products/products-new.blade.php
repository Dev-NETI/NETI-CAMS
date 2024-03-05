<x-app-layout>

    <section>
        <div class="pagetitle">
            <h1>Inventory</h1>
        </div>
        
        <section class="section">
            
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ isset($product_data) ? 'Edit Inventory' : 'Manage Inventory' }}</h5>
                        
                        <x-validation-errors />

                        <form class="row g-3" action="{{ isset($product_data) ? route('products.update') : route('products.create') }}" method="POST">
                            @csrf
                            @if (isset($product_data))
                                @method('PUT')
                                <input type="hidden" name="product_id" value="{{$product_data->id}}">
                            @endif
                                <div class="col-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ isset($product_data) ? $product_data->name : '' }}">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control" name="price" value="{{ isset($product_data) ? $product_data->price : '' }}">
                                </div>
                                <div class="col-6" {{ isset($product_data) ? 'hidden' : '' }} >
                                    <label class="form-label">Quantity</label>
                                    <input type="number" class="form-control" name="quantity" min="1" value="{{ isset($product_data) ? $product_data->quantity : '' }}"  >
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Unit</label>
                                    <select name="unit_id" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($unit_data as $u_data)
                                                <option value="{{$u_data->id}}"
                                                    {{ isset($product_data) && $product_data->unit_id == $u_data->id ? 'selected' : '' }}
                                                    >{{$u_data->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Manufacturer</label>
                                    <input type="text" class="form-control" name="manufacturer" value="{{ isset($product_data) ? $product_data->manufacturer : '' }}">
                                </div>
                                <div class="col-6" @if (auth()->user()->usertype_id == 2) hidden @endif>
                                    <label class="form-label">Department</label>
                                    <select name="department_id" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($department_data as $d_data)
                                                <option value="{{$d_data->id}}"
                                                    @if (auth()->user()->usertype_id == 2 && auth()->user()->department_id == $d_data->id)
                                                            selected
                                                    @endif
                                                    {{ isset($product_data) && $product_data->department_id == $d_data->id ? 'selected' : '' }}
                                                    >{{$d_data->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($category_data as $c_data)
                                                <option value="{{$c_data->id}}"
                                                    {{ isset($product_data) && $product_data->category_id == $c_data->id ? 'selected' : '' }}
                                                    >{{$c_data->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Supplier</label>
                                    <select name="supplier_id" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($supplier_data as $s_data)
                                                <option value="{{$s_data->id}}"
                                                    {{ isset($product_data) && $product_data->supplier_id == $s_data->id ? 'selected' : '' }}
                                                    >{{$s_data->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="5">{{ isset($product_data) ? $product_data->description : '' }}</textarea>
                                </div>
                                <div class="col-6" >
                                    <label class="form-label">Low Stock Threshold</label>
                                    <input type="number" class="form-control" name="low_stock_level" min="1" value="{{ isset($product_data) ? $product_data->low_stock_level : '10' }}"  >
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                        </form>

                    </div>
                </div>
                
        </section>
    </section>
    
</x-app-layout>