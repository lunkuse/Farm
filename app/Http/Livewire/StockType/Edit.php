<?php

namespace App\Http\Livewire\StockType;

use App\Models\StockType;
use Livewire\Component;

class Edit extends Component
{
    public StockType $stockType;

    public function mount(StockType $stockType)
    {
        $this->stockType = $stockType;
    }

    public function render()
    {
        return view('livewire.stock-type.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->stockType->save();

        return redirect()->route('admin.stock-types.index');
    }

    protected function rules(): array
    {
        return [
            'stockType.title' => [
                'string',
                'required',
            ],
            'stockType.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
