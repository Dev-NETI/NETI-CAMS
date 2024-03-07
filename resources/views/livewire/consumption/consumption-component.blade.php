<section>
    <div class="pagetitle">
        <h1>Consumption</h1>
    </div>
    
    <section class="section">
        
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <h5 class="card-title">Consumption history</h5>
                    </div>

                    <div class="col-md-4 offset-md-8">
                            <input type="text" wire:model.live="search" class="form-control" placeholder="Search item, purpose, modified by...">
                    </div>

                    <div class="col-md-12 table-responsive">
                            <table class="table table-hover table-striped ">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Purpose</th>
                                                <th>Modified By</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($consumption_data as $data)
                                                        <tr>
                                                            <td>{{$data->product->name}}</td>
                                                            <td>{{$data->quantity}} {{$data->product->unit->name}}</td>
                                                            <td>{{$data->purpose}}</td>
                                                            <td>{{$data->DataModifier}}</td>
                                                            <td>{{$data->date_executed}}</td>
                                                        </tr>
                                                @endforeach
                                        </tbody>
                            </table>
                    </div>

                    <div class="col-md-12">
                            {{ $consumption_data->links("livewire::simple-bootstrap") }}
                    </div>


                </div>
            </div>
            
    </section>
</section>
