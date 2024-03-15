<div class="col-4 mt-2">

    <div class="card">

        <div class="card-header text-center">
            <h5 class="card-title {{ $titleColor }}">
                {{ $title }}
            </h5>
        </div>

        <div class="card-body row">

            <div class="col-md-12">

                @if (count($status_data) > 0)

                    <table class="table table-hover table-striped text-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                @if (auth()->user()->usertype_id === 1)
                                    <th>Department</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($status_data as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->quantity }} {{ $item->unit->name }}</td>
                                    @if (auth()->user()->usertype_id === 1)
                                        <td>{{ $item->department->name }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div>
                        {{ $status_data->links('livewire::simple-bootstrap') }}
                    </div>

                @else
                
                    <h4 class="text-danger text-center mt-2">
                        No available data
                    </h4>
                    
                @endif

            </div>

        </div>

    </div>

</div>
