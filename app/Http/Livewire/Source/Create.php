<?php

namespace App\Http\Livewire\Source;

use App\Models\Source;
use Livewire\Component;

class Create extends Component
{
    public Source $source;

    public function mount(Source $source)
    {
        $this->source = $source;
    }

    public function render()
    {
        return view('livewire.source.create');
    }

    public function submit()
    {
        $this->validate();

        $this->source->save();

        return redirect()->route('admin.sources.index');
    }

    protected function rules(): array
    {
        return [
            'source.name' => [
                'string',
                'required',
            ],
            'source.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
