<section>
    <div class="pagetitle">
        <h1>Suppliers</h1>
    </div>
    
    <section class="section">
        
            <div class="card">
                <div class="card-body row">

                    <div class="col-md-12">
                         <h5 class="card-title">Manage Suppliers</h5>
                    </div>
                    
                    <div class="col-md-12" >
                        <a href="{{route('supplier.new')}}" class="btn btn-outline-primary float-end">Create Supplier</a>
                        <x-notification-message />
                    </div>

                    <div class="col-md-4 offset-md-8 mt-2">
                            <input type="text" wire:model.live="search" class="form-control" placeholder="Search name, contact person, email, phone, address, department...">
                    </div>

                    <div class="col-md-12 table-responsive mt-3">
                            <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                            <tr>
                                                    <th>Name</th>
                                                    <th>Contact Person</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th @if(auth()->user()->usertype_id == "2")  hidden @endif>Department</th>
                                                    <th>Action</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($supplier_data as $data)
                                                <tr>
                                                    <td>{{ $data->name }}</td>
                                                    <td>{{ $data->contact_person }}</td>
                                                    <td>{{ $data->email }}</td>
                                                    <td>{{ $data->phone }}</td>
                                                    <td>{{ $data->address }}</td>
                                                    <td @if(auth()->user()->usertype_id == "2")  hidden @endif >{{ $data->department->name }}</td>
                                                    <td>
                                                            <a href="{{route('supplier.edit' , ['id' => $data->id])}}" class="btn btn-sm btn-info" >Edit</a>
                                                            <button class="btn btn-sm btn-danger" 
                                                            wire:click="destroy({{$data->id}})" 
                                                            wire:confirm="Are you sure you want to delete this supplier?">Delete</button>
                                                    </td>
                                                </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                    </div>

                    <div class="col-md-12">
                            {{ $supplier_data->links("livewire::simple-bootstrap") }}
                    </div>

                </div>
            </div>
            
    </section>
</section>
