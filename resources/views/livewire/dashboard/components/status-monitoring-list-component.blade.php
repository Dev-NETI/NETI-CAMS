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
                    <ul class="list-group mt-2">
                        @foreach ($status_data as $item)
                            <li class="list-group-item">
                                {{ $item->name }}
                                @if ($statusId != 1)
                                    <span class="badge rounded-pill bg-info text-dark float-end">Current Quantity:
                                        {{ $item->quantity }} {{ $item->unit->name }}</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
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
