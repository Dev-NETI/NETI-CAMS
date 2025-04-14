<tr>
    <td>{{ $data->product->name }}</td>
    <td>{{ $data->product->category->name }}</td>
    <td>{{ $data->quantity }} {{ $data->product->unit->name }}</td>
    <td>{{ $data->purpose }}</td>
    <td>{{ $data->DataModifier }}</td>
    <td>
        @can('AuthorizeRolePolicy', 39)
                @if($isEditing)
                    <input type="date" wire:model="editedDate" class="border rounded p-1">
                    <button wire:click="save" class="bg-primary text-white px-2 py-1 rounded">Save</button>
                    <button wire:click="cancel" class="bg-danger text-white px-2 py-1 rounded">Cancel</button>
                @else
                    {{ $data->date_executed }}
                    <button wire:click="edit" class="bg-success text-white px-2 py-1 rounded">Edit</button>
                @endif
        @else
                {{ $data->date_executed }}
        @endcan
        
    </td>
</tr>