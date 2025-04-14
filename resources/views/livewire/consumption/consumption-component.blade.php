<section>
    <div class="pagetitle">
        <h1>Consumption Logs</h1>
    </div>

    <section class="section">

        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                    <h5 class="card-title">Consumption history</h5>
                    <div class="alert alert-info bg-info border-0 alert-dismissible fade show" role="alert">
                        This module functions as a record of the utilization history of assets.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

                <div class="col-md-4 offset-md-8">
                    <input type="text" wire:model.live="search" class="form-control"
                        placeholder="Search item, purpose, modified by...">
                </div>

                <div class="col-md-12 table-responsive">
                    <table class="table table-hover table-striped ">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Consumption Purpose</th>
                                <th>Consumed By</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($consumption_data as $data)
                                <livewire:components.logs.consumption-list-item-component :data="$data" :wire:key="$data->id" />
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                    {{ $consumption_data->links('livewire::simple-bootstrap') }}
                </div>


            </div>
        </div>

    </section>
</section>
