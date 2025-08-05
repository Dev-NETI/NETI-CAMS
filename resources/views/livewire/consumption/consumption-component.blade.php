<section>
    <div class="pagetitle">
        <h1>Consumption Logs</h1>
    </div>

    <section class="section">

        <div class="card">
            <div class="card-body row">
                <div class="col-md-12">
                    <h5 class="card-title">Consumption history</h5>
                    <div class="alert alert-info bg-info border-0 alert-dismissible fade show" role="alert">
                        This module functions as a record of the utilization history of assets.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Filter Options</h6>

                            <!-- Search Row -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="search" class="form-label">Search:</label>
                                    <input type="text" wire:model="search" class="form-control" id="search"
                                        placeholder="Search item, purpose, modified by...">
                                </div>
                            </div>

                            <!-- Date Filter Row -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="startDate" class="form-label">Date From:</label>
                                    <input type="date" wire:model="startDate" class="form-control" id="startDate">
                                </div>
                                <div class="col-md-6">
                                    <label for="endDate" class="form-label">Date To:</label>
                                    <input type="date" wire:model="endDate" class="form-control" id="endDate">
                                </div>
                            </div>

                            <!-- Button Row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <button wire:click="searchData" class="btn btn-primary w-100">Search</button>
                                </div>
                                <div class="col-md-6">
                                    <button wire:click="clearFilters" class="btn btn-secondary w-100">Clear All</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
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
                                    <livewire:components.logs.consumption-list-item-component :data="$data"
                                        :wire:key="$data->id" />
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-12">
                    {{ $consumption_data->links('livewire::simple-bootstrap') }}
                </div>

            </div>
        </div>

    </section>
</section>
