<section>
    <div class="pagetitle">
        <h1>Units</h1>
    </div>
    
    <section class="section">
        
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Units</h5>

                    <div class="row">

                        <div class="col-md-12">
                            <a href="{{route('unit.create')}}" class="btn btn-outline-primary float-end">Create Unit</a>
                        </div>

                        <div class="col-md-12">
                            <x-notification-message />
                        </div>

                        <div class="col-md-4 offset-md-8 mt-2">
                            <input type="text" wire:model.live="search" class="form-control" placeholder="Search unit...">
                        </div>
                        
                        <div class="col-md-12 table-responsive mt-3">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                            <tr>
                                                <th>Unit</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($unit_data as $item)
                                            <tr>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->description}}</td>
                                                    <td>
                                                        <a href="{{route('unit.edit', ['id'=>$item->id])}}" class="btn btn-sm btn-success" title="Edit">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        
                                                        <form action="{{route('unit.destroy')}}" id="formDestroy{{$item->id}}" method="POST" hidden>
                                                            @csrf
                                                            @method("PUT")
                                                            <input type="hidden" name="unit_id" value="{{$item->id}}" >
                                                        </form>
                                                        <button type="submit" class="btn btn-sm btn-danger" form="formDestroy{{$item->id}}" title="Delete">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                        
                                                        
                                                    </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>

                        <div class="col-md-12">
                                    {{ $unit_data->links("livewire::simple-bootstrap") }}
                        </div>



                    </div>

                </div>
            </div>

    </section>
</section>
