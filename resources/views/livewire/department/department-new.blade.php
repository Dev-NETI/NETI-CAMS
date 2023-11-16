<x-app-layout>

    <section>
        <div class="pagetitle">
            <h1>Department</h1>
        </div>
        
        <section class="section">
            
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ isset($department_data) ? 'Edit Department' : 'Create Department'}}</h5>
                            <x-validation-errors />
                            <form class="row g-3" action="{{ isset($department_data) ? route('department.update') : route('department.create') }}" method="POST">
                                @csrf
                                @if (isset($department_data))
                                    @method('PUT')
                                    <input type="hidden" name="department_id" value="{{$department_data->id}}">
                                @endif
                                <div class="col-12">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ isset($department_data) ? $department_data->name : '' }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <input type="text" class="form-control" name="description" value="{{ isset($department_data) ? $department_data->description : '' }}">
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