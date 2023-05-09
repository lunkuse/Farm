<?php

namespace App\Http\Livewire\SalePurpose;

use App\Models\SalePurpose;
use Livewire\Component;

class Create extends Component
{
    public SalePurpose $salePurpose;

    public function mount(SalePurpose $salePurpose)
    {
        $this->salePurpose = $salePurpose;
    }

    public function render()
    {
        return view('livewire.sale-purpose.create');
    }

    public function submit()
    {
        $this->validate();

        $this->salePurpose->save();

        return redirect()->route('admin.sale-purposes.index');
    }

    protected function rules(): array
    {
        return [
            'salePurpose.purpose' => [
                'string',
                'required',
            ],
            'salePurpose.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
