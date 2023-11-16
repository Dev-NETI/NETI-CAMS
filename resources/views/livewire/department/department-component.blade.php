<section>
    <div class="pagetitle">
        <h1>Department</h1>
    </div>
    
    <section class="section">
        
            <div class="card">
                <div class="card-body row">
                    
                    <div class="col-md-12">
                        <h5 class="card-title">Manage Department</h5>
                        <x-notification-message />
                    </div>

                    <div class="col-md-12">
                        <a href="{{route('department.new')}}" class="btn btn-outline-primary float-end">Create Department</a>
                    </div>
                    
                    <div class="col-md-4 offset-md-8 mt-2">
                            <input type="text" wire:model.live="search" class="form-control" placeholder="Search name, description...">
                    </div>

                    <div class="col-md-12 table-responsive mt-3">
                            <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($department_data as $data)
                                            <tr>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->description }}</td>
                                                <td>
                                                    <a href="{{route('department.edit' , ['id'=>$data->id])}}" class="btn btn-sm btn-info">Edit</a>
                                                    <button class="btn btn-sm btn-danger" wire:click="destroy({{$data->id}})" 
                                                    wire:confirm="Are you sure you want to delete this department?">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                    </div>

                    <div class="col-md-12">
                                {{ $department_data->links("livewire::simple-bootstrap") }}
                    </div>

                </div>
            </div>
            
    </section>
</section>
