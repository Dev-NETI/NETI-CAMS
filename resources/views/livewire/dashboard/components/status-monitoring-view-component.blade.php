<div class="col-12">

    <div class="card">

        <div class="card-header">
            <h5 class="card-title">
                Status Monitoring
            </h5>
        </div>

        <div class="card-body row">
            
            <div class="col-md-12 mt-2 row">
                <div class="col-md-4">

                    <select wire:model.live="departmentId" class="form-control  mt-2">
                        <option value="">Select Department</option>
                        @foreach ($department_data as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <livewire:dashboard.components.status-monitoring-list-component departmentId="{{ $departmentId }}"
                titleColor="text-warning" title="Out of Stock" statusId="1" />
            <livewire:dashboard.components.status-monitoring-list-component departmentId="{{ $departmentId }}"
                titleColor="text-danger" title="Low Stock" statusId="2" />
            <livewire:dashboard.components.status-monitoring-list-component departmentId="{{ $departmentId }}"
                titleColor="text-success" title="On Stock" statusId="3" />

        </div>

    </div>

</div>
