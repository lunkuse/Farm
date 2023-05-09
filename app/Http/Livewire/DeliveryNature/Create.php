<?php

namespace App\Http\Livewire\DeliveryNature;

use App\Models\DeliveryNature;
use Livewire\Component;

class Create extends Component
{
    public DeliveryNature $deliveryNature;

    public function mount(DeliveryNature $deliveryNature)
    {
        $this->deliveryNature = $deliveryNature;
    }

    public function render()
    {
        return view('livewire.delivery-nature.create');
    }

    public function submit()
    {
        $this->validate();

        $this->deliveryNature->save();

        return redirect()->route('admin.delivery-natures.index');
    }

    protected function rules(): array
    {
        return [
            'deliveryNature.name' => [
                'string',
                'required',
            ],
            'deliveryNature.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
