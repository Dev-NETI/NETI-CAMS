<x-app-layout>
    <section>
        <div class="pagetitle">
            <h1>User Management</h1>
        </div>
        
        <section class="section">
            
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ isset($user_data) ? 'Edit user' : 'Create users' }}</h5>
                        
                            <x-validation-errors />

                            <form class="row g-3" action="{{ isset($user_data) ? route('user.update') : route('user.create') }}" method="POST">
                                @csrf
                                @if(isset($user_data->id))
                                    @method('PUT')
                                    <input type="hidden" name="user_id" value="{{$user_data->id}}">
                                @endif
                                <div class="col-md-4 offset-md-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ isset($user_data) ? $user_data->name : '' }}">
                                </div>
                                <div class="col-md-4 offset-md-4">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ isset($user_data) ? $user_data->email : '' }}">
                                </div>
                                <div class="col-md-4 offset-md-4">
                                    <label class="form-label">Department</label>
                                    <select name="department_id" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($department_data as $d_data)
                                                    <option value="{{$d_data->id}}" 
                                                        {{ isset($user_data) && $user_data->department_id == $d_data->id ? 'selected' : '' }}>{{$d_data->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 offset-md-4">
                                    <label class="form-label">User Type</label>
                                    <select name="usertype_id" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($user_type_data as $utype_data)
                                                <option value="{{$utype_data->id}}" 
                                                    {{ isset($user_data) && $user_data->usertype_id == $utype_data->id ? 'selected' : '' }}>{{$utype_data->user_type}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 offset-md-4" {{ isset($user_data) ? 'hidden' : '' }} >
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="password" id="password" value="{{ isset($user_data) ? $user_data->password : '' }}" readonly>
                                        <button class="btn btn-primary" type="button" id="generatePassword">Generate</button>
                                    </div>
                                </div>
                                <div class="col-md-4 offset-md-4">
                                     <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>


                    </div>
                </div>
                
        </section>
    </section>

    
</x-app-layout>