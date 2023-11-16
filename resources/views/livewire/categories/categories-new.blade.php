<x-app-layout>
    
    <section>
        <div class="pagetitle">
            <h1>Categories</h1>
        </div>
        
        <section class="section">
            
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ isset($category_data) ? 'Edit Category' : 'New Category' }}</h5>
                    
                        <x-validation-errors />
                        <form class="row g-3" action="{{ isset($category_data) ? route('categories.update') : route('categories.create')}}" method="POST">
                            @csrf
                            @if (isset($category_data))
                                @method('PUT')
                                <input type="hidden" name="category_id" value="{{$category_data->id}}">
                            @endif
                            <div class="col-12">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ isset($category_data) ? $category_data->name : '' }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" cols="30" rows="10">{{ isset($category_data) ? $category_data->description : '' }}</textarea>
                            </div>
                            <div class="col-12" @if (auth()->user()->usertype_id == 2) hidden @endif>
                                <label class="form-label">Department</label>
                                <select name="department_id" class="form-control">
                                    <option value="">Select</option>
                                    
                                    @foreach ($department_data as $data)
                                        <option value="{{ $data->id }}" 
                                            @if (auth()->user()->usertype_id == 2 && auth()->user()->department_id == $data->id)
                                                            selected
                                            @endif
                                            {{ (isset($category_data) && $category_data->department->id == $data->id) ? 'selected' : '' }}>
                                            {{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <input type="submit" class="btn btn-primary" value="Save Category">
                            </div>
                        </form>
    
    
                </div>
                </div>
                
        </section>
    </section>
    
</x-app-layout>