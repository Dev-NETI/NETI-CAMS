<div wire:ignore.self class="modal fade" id="ExportModal" tabindex="-1" role="dialog"
    aria-labelledby="ExportModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="card-title">Export</h4>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="export" id="FormExport">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label>Category</label>
                            <select wire:model="category_id" class="form-control">
                                <option value="">All</option>
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="FormExport">Export</button>
            </div>
        </div>
    </div>
</div>
