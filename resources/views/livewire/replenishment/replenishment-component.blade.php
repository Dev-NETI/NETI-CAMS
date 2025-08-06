<section>
    <div class="pagetitle">
        <h1>Replenishment Logs</h1>
    </div>

    <section class="section">

        <div class="card">
            <div class="card-body row">
                {{-- <div class="col-md-12">
                    <h5 class="card-title">Replenishment history</h5>
                    <div class="alert alert-info bg-info border-0 alert-dismissible fade show" role="alert">
                        This module functions as a record of the replenishment history of assets.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div> --}}

                <!-- Filter Section -->
                <div class="col-md-4 offset-md-8 mb-3 mt-2">
                    <div class="card">
                        <div class="card-body p-2">
                            <h6 class="card-title mb-2 small">Filter Options</h6>

                            <!-- Search Row -->
                            <div class="row mb-1">
                                <div class="col-md-12">
                                    <label for="search" class="form-label small mb-1">Search:</label>
                                    <input type="text" wire:model="search" class="form-control form-control-sm"
                                        id="search" placeholder="Search...">
                                </div>
                            </div>

                            <!-- Date Filter Row -->
                            <div class="row mb-1">
                                <div class="col-md-6">
                                    <label for="startDate" class="form-label small mb-1">From:</label>
                                    <input type="date" wire:model="startDate" class="form-control form-control-sm"
                                        id="startDate">
                                </div>
                                <div class="col-md-6">
                                    <label for="endDate" class="form-label small mb-1">To:</label>
                                    <input type="date" wire:model="endDate" class="form-control form-control-sm"
                                        id="endDate">
                                </div>
                            </div>

                            <!-- Button Row -->
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <button wire:click="searchData" class="btn btn-primary btn-sm w-100">Search</button>
                                </div>
                                <div class="col-md-6">
                                    <button wire:click="clearFilters"
                                        class="btn btn-secondary btn-sm w-100">Clear</button>
                                </div>
                            </div>

                            <!-- Export Button Row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <button wire:click="exportToExcel" class="btn btn-success btn-sm w-100">
                                        <i class="bi bi-file-earmark-excel me-1"></i>Export to Excel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped small">
                            <thead>
                                <tr>
                                    <th class="small">Item</th>
                                    <th class="small">Category</th>
                                    <th class="small">Quantity</th>
                                    <th class="small">Description</th>
                                    <th class="small">Replenished By</th>
                                    <th class="small">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($replenishment_data as $data)
                                    <livewire:components.logs.replenishment-list-item-component :data="$data"
                                        :wire:key="$data->id">
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="col-md-12">
                    {{ $replenishment_data->links('vendor.livewire.bootstrap-pagination') }}
                </div>

            </div>
        </div>

    </section>
</section>
