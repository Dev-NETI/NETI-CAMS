<?php

namespace App\Livewire\Components\Logs;

use App\Models\Consumption;
use Illuminate\Support\Carbon;
use Livewire\Component;

class ConsumptionListItemComponent extends Component
{
    public $data;
    public $isEditing = false;
    public $editedDate;

    public function edit()
    {
        $this->isEditing = true;
        $this->editedDate = Carbon::parse($this->data->created_at)->toDateString();
    }

    public function save()
    {
        $this->validate([
            'editedDate' => 'required|date',
        ]);

        $replenishmentData = Consumption::find($this->data->id);

        $replenishmentData->update([
            'created_at' => $this->editedDate,
        ]);

        $this->isEditing = false;
        $this->data->refresh();
        $this->dispatch('date-updated'); // Dispatch event to parent
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->reset('editedDate');
    }

    public function render()
    {
        return view('livewire.components.logs.consumption-list-item-component');
    }
}
