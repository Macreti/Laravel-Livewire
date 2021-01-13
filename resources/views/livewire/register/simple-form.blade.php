<div class="card">
    <h3 class="card-header">Register Form</h3>
    <div class="card-body">
        <form wire:submit.prevent="submit">
            <fieldset>
                <div class="form-group">
                    <label for="phonenumber">
                        <span class="req">*</span> Phone Number:
                    </label>
                    <input class="form-control" type="text" wire:model="phoneNumber"/>
                    @error('phoneNumber') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="firstname">
                        <span class="req">*</span> First name:
                    </label>
                    <input class="form-control" type="text" wire:model="firstName"/>
                    @error('firstName') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="lastname">
                        <span class="req">*</span> Last name:
                    </label>
                    <input class="form-control" type="text" wire:model="lastName"/>
                    @error('lastName') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="email">
                        <span class="req">*</span> Email Address:
                    </label>
                    <input class="form-control" type="text" wire:model="email"/>
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="username">
                        <span class="req">*</span> Username:
                    </label>
                    <input class="form-control" type="text" wire:model="username"/>
                    @error('username') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="password">
                        <span class="req">*</span> Password:
                    </label>
                    <input class="form-control" type="password" wire:model="password"/>
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>

                {{--<div class="form-group">
                    <label for="password">
                        <span class="req">*</span> Password Confirm:
                    </label>
                    <input class="form-control" type="password" required/>
                </div>--}}

                <div class="form-group">
                    <input type="checkbox">
                    <label for="terms">
                        I agree with the <a href="#" title="You may read our terms and conditions by clicking on this link">terms and conditions</a> for Registration.
                    </label>
                </div>

                <div class="form-group">
                    <input class="btn btn-success" type="submit"  value="Register">
                </div>
            </fieldset>
        </form><!-- ends register form -->
    </div>
</div>
