<div class="col-12">

    <div class="card">

        <div class="card-header">
            <h5 class="card-title">
                Expiration Tracking
            </h5>
        </div>

        <div class="card-body row">
            <livewire:dashboard.components.expiration-tracking-list-component expiredId="1" titleColor="text-danger" title="Expired" />
            <livewire:dashboard.components.expiration-tracking-list-component expiredId="2" titleColor="text-warning" title="Expiring Within 1 Week" />
            <livewire:dashboard.components.expiration-tracking-list-component expiredId="3" titleColor="text-info" title="Expiring Within 1 Month" />
        </div>

    </div>

</div>
