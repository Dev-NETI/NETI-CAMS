<section>
    <div class="pagetitle">
        <h1>User Management</h1>
    </div>
    
    <section class="section">
        
            <div class="card">
                <div class="card-body row">

                    <div class="col-md-12">
                        <h5 class="card-title">Manage Users</h5>
                        <x-notification-message />
                    </div>

                    <div class="col-md-12">
                        <a href="{{route('user.new')}}" class="btn btn-outline-primary float-end ms-2">Create User</a>
                        <a href="{{route('roles.index')}}" class="btn btn-outline-info float-end">Roles</a>
                    </div>
                    
                    <div class="col-md-4 offset-md-8 mt-2">
                        <input type="text" wire:model.live="search" class="form-control" placeholder="Search name, email, department, usertype...">
                    </div>

                    <div class="col-md-12 table-responsive mt-3">
                            <table class="table table-hover table-striped">
                                    <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Department</th>
                                                <th>User_type</th>
                                                <th>Action</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user_data as $data)
                                            <tr>
                                                <td>{{$data->name}}</td>
                                                <td>{{$data->email}}</td>
                                                <td>{{$data->department->name}}</td>
                                                <td>{{$data->User_type->user_type}}</td>
                                                <td>
                                                        <a href="{{route('user.edit' , ['id'=>$data->id])}}" class="btn btn-sm btn-info">Edit</a>
                                                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#PasswordModal"
                                                            wire:click="getUser({{$data->id}})" title="Update Password">
                                                                <i class="bi bi-key-fill"></i>
                                                        </button>
                                                        <a href="{{route('user_roles.index' , ['id'=>$data->id])}}" class="btn btn-sm btn-primary" title="Manage Roles"><i class="bi bi-person-plus-fill"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                    </div>

                    <div class="col-md-12">
                            {{ $user_data->links("livewire::simple-bootstrap") }}
                    </div>
                    
                </div>
            </div>


            {{-- update password modal --}}
            <div wire:ignore.self class="modal fade" id="PasswordModal" tabindex="-1" role="dialog" aria-labelledby="PasswordModal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title mb-0" id="newCatgoryLabel">
                                Update Password for {{$this->user_name}}
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                                    <form class="row" wire:submit.prevent="updatePassword" id="formPassword">
                                            @csrf
                                            <div class="col-md-12">
                                                <label class="form-label">Password</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" wire:model="password" readonly>
                                                    <button class="btn btn-primary" type="button" wire:click="generateUpdatePassword()">Generate</button>
                                                </div>
                                            </div>
                                    </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" form="formPassword">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            
    </section>
</section>
