@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
@endpush

<form x-data="form()">
    <div class="row form-group">
        <input x-ref="description" id="description" name="description" value='{{ $description }}' type="hidden" />
        <div wire:ignore>
            <trix-editor input="description"></trix-editor>
        </div>
    </div>

    <div class="row form-group" wire:ignore>
        <input x-ref="info" id="info" name="info" value='{{ $info }}' type="hidden" />
        <trix-editor class="form-control" input="info"></trix-editor>
    </div>
    <div class="row">
        <button class="btn btn-success" x-on:click.prevent="save">Save</button>
    </div>
</form>

@push('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
    <script>
        function form() {
            return {
                save() {
                    window.livewire.emit('alpineSave', {
                        info: this.$refs.info.value,
                        description: this.$refs.description.value,
                    });
                }
            }
        }
    </script>
@endpush
