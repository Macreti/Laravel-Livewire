<?php

namespace App\Http\Livewire\Trix;

use Livewire\Component;

class TrixComponent extends Component
{
    protected $listeners = ['alpineSave'];
    public $description, $info;

    public function render()
    {
        return view('livewire.trix.trix-component');
    }

    public function alpineSave($array) {
        $this->fill([
            'info' => data_get($array, 'info'),
            'description' => data_get($array, 'description'),
        ]);
        dd("Hello");
    }
}
