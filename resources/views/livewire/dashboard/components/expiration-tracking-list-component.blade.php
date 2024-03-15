<div class="col-4 mt-2">

    <div class="card">

        <div class="card-header text-center">
            <h5 class="card-title {{ $titleColor }}">
                {{ $title }}
            </h5>
        </div>

        <div class="card-body row">

            <div class="col-md-12">

                @if (count($expired_data) > 0)

                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Expiration Date</th>
                                @if (auth()->user()->usertype_id === 1)
                                    <th>Department</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expired_data as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->formatted_expiration_date }}</td>
                                    @if (auth()->user()->usertype_id === 1)
                                        <td>{{ $item->department->name }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div>
                        {{ $expired_data->links('livewire::simple-bootstrap') }}
                    </div>
                @else
                    <h4 class="text-center text-danger mt-2">No Available Data</h4>
                @endif

            </div>

        </div>

    </div>

</div>
