<x-app-layout>

    <section>
        <div class="pagetitle">
            <h1>Unit</h1>
        </div>

        <section class="section">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ isset($unit_data) ? 'Edit Unit' : 'New Unit' }}</h5>

                    <x-validation-errors />
                    
                    <form class="row g-3" action="{{ isset($unit_data) ? route('unit.update') : route('unit.store')}}" method="POST">
                        @csrf
                        @if (isset($unit_data))
                            @method('PUT')
                            <input type="hidden" name="unit_id" value="{{ $unit_data->id }}">
                        @endif
                        <div class="col-12">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ isset($unit_data) ? $unit_data->name : '' }}"
                                >
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" cols="30" rows="10">{{ isset($unit_data) ? $unit_data->description : '' }}</textarea>
                        </div>
                        <div class="col-12">
                            <input type="submit" class="btn btn-primary" value="Save Unit">
                        </div>
                    </form>


                </div>
            </div>

        </section>
    </section>

</x-app-layout>
