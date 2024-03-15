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
                    <ul class="list-group mt-2">
                        @foreach ($expired_data as $item)
                            <li class="list-group-item">
                                {{ $item->name }}
                                <span class="badge rounded-pill bg-info text-dark float-end">Expiration Date:
                                    {{ $item->formatted_expiration_date }}</span>
                            </li>
                        @endforeach
                    </ul>
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
