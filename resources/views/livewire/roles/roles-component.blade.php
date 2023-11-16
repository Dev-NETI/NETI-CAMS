<section>
    <div class="pagetitle">
        <h1>Roles</h1>
    </div>
    
    <section class="section">
        
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-12">
                        <h5 class="card-title">Manage Roles</h5>
                        
                        <x-notification-message />
                    </div>

                    <div class="col-md-12">
                        <button type="button" class="btn btn-sm btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#RoleModal" >
                                Create Role
                        </button>
                    </div>

                    <div class="col-md-12 table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($roles_data as $data)
                                                <tr>
                                                    <td>{{$data->name}}</td>
                                                    <td>
                                                                <button class="btn btn-sm btn-info" wire:click="edit({{$data->id}})"  
                                                                    data-bs-toggle="modal" data-bs-target="#RoleModal">Edit</button>
                                                                <button class="btn btn-sm btn-danger" wire:click="delete({{$data->id}})" 
                                                                    wire:confirm="Are you sure you want to delete this role?">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                    </div>
                    
                </div>
            </div>
            
    </section>


            {{-- create role modal --}}
            <div wire:ignore.self class="modal fade" id="RoleModal" tabindex="-1" role="dialog" aria-labelledby="RoleModal"
                        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title mb-0" id="newCatgoryLabel">
                                        {{ isset($this->role_id) ? 'Edit Role for '.$this->name : 'Create Roles' }}
                                    </h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="resetRoleId()">
                                    </button>
                                </div>
                                <div class="modal-body">
                                            <form class="row"  id="formRoles" wire:submit.prevent="{{ isset($this->role_id) ? 'update' : 'create' }}">
                                                    @csrf
                                                    <div class="col-md-12">
                                                            <label >Role Name</label>
                                                            <input type="text" wire:model="name" class="form-control">
                                                            <div>@error('name') <span class="text-danger">{{ $message }}</span> @enderror</div>
                                                    </div>
                                            </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="resetRoleId()">Close</button>
                                    <button type="submit" class="btn btn-primary" form="formRoles">Save changes</button>
                                </div>
                            </div>
                        </div>
            </div>

</section>
