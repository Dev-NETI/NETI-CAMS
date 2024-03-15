<div class="col-12">

    <div class="card">

        <div class="card-header">
            <h5 class="card-title">
                Status Monitoring
            </h5>
        </div>

        <div class="card-body row">

            <livewire:dashboard.components.status-monitoring-list-component titleColor="text-warning" title="Out of Stock" statusId="1"  />
            <livewire:dashboard.components.status-monitoring-list-component titleColor="text-danger" title="Low Stock" statusId="2"  />
            <livewire:dashboard.components.status-monitoring-list-component titleColor="text-success" title="On Stock" statusId="3"  />

        </div>

    </div>

</div>
