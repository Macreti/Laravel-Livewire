<div>
    <div class="row">
        <div class="col-md-4">
            @include('livewire.register.simple-form')
        </div>
        <div class="col-md-4">
            @include('livewire.register.file-form')
        </div>
        <div class="col-md-4">
            <div>
                <span>{{ $test }}</span>
                <div x-data>
                    <h1 x-text="$wire.count"></h1>

                    <button x-on:click="$wire.increment()">Increment</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">

            <div x-data="{ open: @entangle('showDropdown') }">
                <button @click="open = true">Show More...</button>

                <ul x-show="open" @click.away="open = false">
                    <li><button wire:click="archive">Archive</button></li>
                    <li><button wire:click="delete">Delete</button></li>
                </ul>
            </div>

        </div>

        <div class="col-md-4">
            <label for="datepicker"> Select Date: </label>
            <input class="form-control" type="text" id="datepicker">
        </div>

        <div class="col-md-4">
            <x-test>
                    <x-slot name="trigger">
                        <button>Show More...</button>
                    </x-slot>

                    <ul>
                        <li><button wire:click="archive">Archive</button></li>
                        <li><button wire:click="delete">Delete</button></li>
                    </ul>
            </x-test>
        </div>
    </div>
</div>
