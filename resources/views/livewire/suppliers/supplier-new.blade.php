<x-app-layout>

    <section>
        <div class="pagetitle">
            <h1>Suppliers</h1>
        </div>
        
        <section class="section">
            
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ isset($supplier_data) ? 'Edit Supplier' : 'Add Supplier' }}</h5>
                        <x-validation-errors />
                        <form class="row g-3" action="{{ isset($supplier_data) ? route('supplier.update') : route('supplier.create') }}" method="POST">
                            @csrf
                            @if (isset($supplier_data))
                                @method('PUT')
                                <input type="hidden" name="supplier_id" value="{{ $supplier_data->id }}">
                            @endif
                            <div class="col-12">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ isset($supplier_data) ? $supplier_data->name : '' }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Contact Person</label>
                                <input type="text" class="form-control" name="contact_person" value="{{ isset($supplier_data) ? $supplier_data->contact_person : '' }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ isset($supplier_data) ? $supplier_data->email : '' }}" >
                            </div>
                            <div class="col-12">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ isset($supplier_data) ? $supplier_data->phone : '' }}" >
                            </div>
                            <div class="col-12">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control" cols="30" rows="10">{{ isset($supplier_data) ? $supplier_data->address : '' }}</textarea>
                            </div>
                            <div class="col-12" @if (auth()->user()->usertype_id == 2) hidden @endif >
                                <label class="form-label">Department</label>
                                <select name="department_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($department_data as $data)
                                        <option value="{{$data->id}}"  
                                            @if (auth()->user()->usertype_id == 2 && auth()->user()->department_id == $data->id)
                                                            selected
                                            @endif
                                            {{ isset($supplier_data) && $supplier_data->department_id == $data->id ? 'selected' : '' }}
                                            >{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                </div>
                </div>
                
        </section>
    </section>
    
</x-app-layout>