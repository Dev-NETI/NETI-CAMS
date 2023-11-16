<section>
    <div class="pagetitle">
        <h1>Manage Roles</h1>
    </div>
    
    <section class="section">
        
        <div class="card">
            <div class="card-body row">
                <div class="col-md-12">
                    <h5 class="card-title">Manage roles for {{$user_data->name}}</h5>
                    <x-notification-message />
                </div>

                <div class="col-md-4">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $checkcount = 1; @endphp
                            @foreach($roles_data as $role)
                            <tr>
                                    <td>
                                        <input type="checkbox" wire:model.defer="selectedRoles" value="{{ $role->id }}" id="checkBox{{$checkcount}}" form="formAddRoles">
                                    </td>
                                    <td>
                                        <label class="fs-6" for="checkBox{{$checkcount}}">{{$role->name}}</label>
                                    </td>
                            </tr>
                            @php $checkcount++; @endphp
                            @endforeach
                    </tbody>
                    </table>
                </div>

                <div class="col-md-4 text-center align-self-center">
                    <form class="row" id="formAddRoles" wire:submit.prevent="create">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">Add Roles</button>
                    </form>
                </div>

                <div class="col-md-4">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th colspan="2">Current Roles of {{$user_data->name}}</th>
                            </tr>
                            <tr>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user_roles as $u_roles)
                            <tr>
                                <td>{{$u_roles->Roles->name}}</td>
                                <td>
                                    <button class="btn btn-sm btn-danger" 
                                    wire:click="delete({{$u_roles->id}})" 
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
</section>
