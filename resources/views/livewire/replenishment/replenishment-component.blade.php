<section>
    <div class="pagetitle">
        <h1>Replenishment Logs</h1>
    </div>
    
    <section class="section">
        
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-12">
                        <h5 class="card-title">Replenishment history</h5>
                        <div class="alert alert-info bg-info border-0 alert-dismissible fade show" role="alert">
                            This module functions as a record of the replenishment history of assets.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    
                    <div class="col-md-4 offset-md-8">
                            <input type="text" wire:model.live="search" class="form-control" placeholder="Search item , description , modified by...">
                    </div>

                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Category</th>
                                                <th>Quantity</th>
                                                <th>Description</th>
                                                <th>Replenished By</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($replenishment_data as $data)
                                                <livewire:components.logs.replenishment-list-item-component :data="$data" :wire:key="$data->id">
                                                @endforeach
                                        </tbody>
                            </table>
                        </div>
                    </div>
                    

                    <div class="col-md-12">
                            {{ $replenishment_data->links('livewire::simple-bootstrap') }}
                    </div>

                    
                </div>
            </div>
            
    </section>
</section>