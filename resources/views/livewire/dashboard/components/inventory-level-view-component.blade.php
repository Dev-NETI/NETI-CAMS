<div class="col-12">

    <div class="card">

        <div class="card-header">
            <h5 class="card-title">
                Inventory Level
            </h5>
        </div>

        <div class="card-body row">

            @foreach ($category_data as $item)
                <livewire:dashboard.components.inventory-level-items-component />
            @endforeach

        </div>

    </div>

</div>
