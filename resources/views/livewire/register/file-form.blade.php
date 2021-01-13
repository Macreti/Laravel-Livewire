<div class="card">
    <h3 class="card-header">Upload File Form</h3>
    <div class="card-body">
        <form wire:submit.prevent="upload">
            <fieldset>
                <div class="form-group">
                    @if($avatar)
                        Preview:
                        <img src="{{ $avatar->temporaryUrl() }}">
                    @endif
                </div>
                <div class="form-group">
                    <label for="avatar">
                        <span class="req">*</span> Avatar:
                    </label>
                    <input class="form-control" type="file" wire:model="avatar"/>
                    @error('avatar') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <input class="btn btn-success" type="submit"  value="Upload">
                </div>
            </fieldset>
        </form><!-- ends register form -->
    </div>
</div>
