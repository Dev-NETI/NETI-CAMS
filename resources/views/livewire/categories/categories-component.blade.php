<section>
    <div class="pagetitle">
        <h1>Categories</h1>
    </div>
    
    <section class="section">
        
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage categories</h5>

                    <div class="row">

                        <div class="col-md-12">
                            <a href="{{route('categories.new')}}" class="btn btn-outline-primary float-end">Create Category</a>
                        </div>

                        <div class="col-md-12">
                            <x-notification-message />
                        </div>

                        <div class="col-md-4 offset-md-8 mt-2">
                            <input type="text" wire:model.live="search" class="form-control" placeholder="Search name, description, department...">
                        </div>
                        
                        <div class="col-md-12 table-responsive mt-3">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th @if(auth()->user()->usertype_id == "2")  hidden @endif>Department</th>
                                                <th>Action</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($category_data as $data)
                                                <tr>
                                                    <td>{{$data->name}}</td>
                                                    <td><textarea>{{$data->description}}</textarea></td>
                                                    <td @if(auth()->user()->usertype_id == "2")  hidden @endif>{{$data->department->name}}</td>
                                                    <td>
                                                        <a href="{{route('categories.edit' , ['id' => $data->id])}}" class="btn btn-sm btn-info">
                                                            Edit
                                                        </a>
                                                        <button class="btn btn-sm btn-danger" wire:click="destroy({{$data->id}})" 
                                                            wire:confirm="Are you sure you want to delete this category?">
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                        </div>

                        <div class="col-md-12">
                                    {{ $category_data->links("livewire::simple-bootstrap") }}
                        </div>



                    </div>

                </div>
            </div>

    </section>
</section>
