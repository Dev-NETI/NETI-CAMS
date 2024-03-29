<section>
    <div class="pagetitle">
        <h1>Inventory</h1>
    </div>

    <section class="section">

        <div class="card">
            <div class="card-body row">
                <div class="col-md-12">
                    <h5 class="card-title">Manage Inventory</h5>
                </div>

                <div class="col-md-12">
                    <a href="{{ route('products.new') }}" class="btn btn-outline-primary float-end">Create Inventory</a>
                    <x-notification-message />
                </div>

                <div class="col-md-4 mt-5">
                    <div class="input-group">
                        @if (auth()->user()->usertype_id === 1)
                            <select class="form-control" wire:model.live="department">
                                <option value="">Select Department</option>
                                @foreach ($department_data as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        @endif
                        <div class="input-group-prepend">
                            <select class="form-control" wire:model.live="category">
                                <option value="">Select Category</option>
                                @foreach ($category_data as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 offset-md-4 mt-5">
                    <div class="input-group">
                        <input type="text" wire:model.live="search" class="form-control"
                            placeholder="Search asset...">
                        <div class="input-group-append">
                            <button data-bs-toggle="modal" data-bs-target="#ExportModal" class="btn btn-danger"
                                title="Export">
                                <i class="bi bi-download"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 table-responsive mt-1">
                    <table class="table table-hover table-striped" id="inv-table">
                        <thead>
                            <tr>
                                <th>Status</th>
                                @can('AuthorizeRolePolicy', 32)
                                    <th>
                                        Name
                                    </th>
                                @endcan

                                @can('AuthorizeRolePolicy', 33)
                                    <th>
                                        Description
                                    </th>
                                @endcan
                                @can('AuthorizeRolePolicy', 30)
                                    <th>Price</th>
                                @endcan
                                @can('AuthorizeRolePolicy', 34)
                                    <th>
                                        Quantity
                                    </th>
                                @endcan

                                @can('AuthorizeRolePolicy', 30)
                                    <th>Total</th>
                                @endcan
                                <th @if (auth()->user()->usertype_id == '2') hidden @endif>Department</th>
                                @can('AuthorizeRolePolicy', 35)
                                    <th>
                                        Category
                                    </th>
                                @endcan

                                @can('AuthorizeRolePolicy', 36)
                                    <th>
                                        Supplier
                                    </th>
                                @endcan

                                @can('AuthorizeRolePolicy', 37)
                                    <th>
                                        Remarks
                                    </th>
                                @endcan

                                <th>Modified By</th>
                                <th>Last Modified</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product_data as $data)
                                <tr>
                                    <td>
                                        {!! $data->expiration_status !!}
                                        @if ($data->quantity == 0)
                                            <span class="badge bg-warning">Out of stock</span>
                                        @elseif ($data->quantity <= $data->low_stock_level)
                                            <span class="badge bg-danger">Low Stock</span>
                                        @else
                                            <span class="badge bg-success">On Stock</span>
                                        @endif
                                    </td>
                                    @can('AuthorizeRolePolicy', 32)
                                        <td>{{ $data->name }}</td>
                                    @endcan

                                    @can('AuthorizeRolePolicy', 33)
                                        <td>
                                            {{ $data->formatted_description }}
                                        </td>
                                    @endcan
                                    @can('AuthorizeRolePolicy', 30)
                                        <td>{{ $data->price }}</td>
                                    @endcan
                                    @can('AuthorizeRolePolicy', 34)
                                        <td>{{ $data->quantity }} {{ $data->unit->name }}</td>
                                    @endcan
                                    @can('AuthorizeRolePolicy', 30)
                                        <td>{{ $data->price * $data->quantity }}</td>
                                    @endcan
                                    <td @if (auth()->user()->usertype_id == 2) hidden @endif>
                                        {{ $data->department->name }}
                                    </td>
                                    @can('AuthorizeRolePolicy', 35)
                                        <td>{{ $data->category->name }}</td>
                                    @endcan
                                    @can('AuthorizeRolePolicy', 36)
                                        <td>{{ $data->supplier->name }}</td>
                                    @endcan
                                    @can('AuthorizeRolePolicy', 37)
                                        <td>{{ $data->formatted_remarks }}</td>
                                    @endcan
                                    <td>{{ $data->LastModifiedBy }}</td>
                                    <td>{{ $data->formatted_updated_date }}</td>
                                    <td style="width:150px;">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><button class="dropdown-item" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#ReplenishmentModal"
                                                        wire:click="getItem({{ $data->id }})">Replenish</button>
                                                </li>
                                                <li><button class="dropdown-item" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#ConsumptionModal"
                                                        wire:click="getItem({{ $data->id }})">Consume</button></li>
                                                <li><a href="{{ route('products.edit', ['id' => $data->id]) }}"
                                                        class="dropdown-item">Edit</a></li>
                                                <li><button class="dropdown-item" type="button"
                                                        wire:confirm="Are you sure you want to delete this item?"
                                                        wire:click="destroy({{ $data->id }})">Delete</button>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $product_data->links('livewire::simple-bootstrap') }}
                </div>

            </div>
        </div>


        {{-- consumption modal --}}
        <div wire:ignore.self class="modal fade" id="ConsumptionModal" tabindex="-1" role="dialog"
            aria-labelledby="ConsumptionModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title mb-0" id="newCatgoryLabel">
                            Consumption for {{ $this->product_name }}
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" id="formConsumption" wire:submit.prevent="Consumption">
                            @csrf
                            <div class="col-md-12">
                                <label class="form-label">Quantity in {{ $this->unit }}</label>
                                <input type="number" wire:model="quantity" class="form-control" min="1"
                                    max="{{ $this->max_quantity }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Purpose</label>
                                <textarea wire:model="purpose" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" form="formConsumption">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- consumption modal end --}}

        {{-- replenishment modal --}}
        <div wire:ignore.self class="modal fade" id="ReplenishmentModal" tabindex="-1" role="dialog"
            aria-labelledby="ReplenishmentModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title mb-0" id="newCatgoryLabel">
                            Replenishment for {{ $this->product_name }}
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" id="formReplenishment" wire:submit.prevent="Replenishment">
                            @csrf
                            <div class="col-md-12">
                                <label class="form-label">Quantity in {{ $this->unit }}</label>
                                <input type="number" wire:model="quantity" class="form-control" min="1">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description</label>
                                <textarea wire:model="description" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" form="formReplenishment">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- replenishment modal end --}}

        {{-- export modal --}}
        <livewire:products.component.generate-inventory-report-component :category="$category_data" />
        {{-- export modal end --}}

    </section>
</section>
