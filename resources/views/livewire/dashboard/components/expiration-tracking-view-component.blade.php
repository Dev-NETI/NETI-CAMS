<div class="col-12">

    <div class="card">

        <div class="card-header">
            <h5 class="card-title">
                Expiration Tracking
            </h5>
        </div>

        <div class="card-body row">

            @if (auth()->user()->usertype_id == 1)
                <div class="col-md-12 row">
                        <div class="col-md-4">
                                <select wire:model.live="departmentId" class="form-control">
                                        <option value="">Select Department</option>
                                        @foreach ($department_data as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                </select>
                        </div>
                </div>
            @endif

            <livewire:dashboard.components.expiration-tracking-list-component departmentId="{{$departmentId}}" expiredId="1" titleColor="text-danger" title="Expired" />
            <livewire:dashboard.components.expiration-tracking-list-component departmentId="{{$departmentId}}" expiredId="2" titleColor="text-warning" title="Expiring Within 1 Week" />
            <livewire:dashboard.components.expiration-tracking-list-component departmentId="{{$departmentId}}" expiredId="3" titleColor="text-info" title="Expiring Within 1 Month" />
        </div>

    </div>

</div>
