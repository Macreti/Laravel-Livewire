<?php

namespace App\Http\Livewire\Register;

use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterFormComponent extends Component
{
    use WithFileUploads;

    public $phoneNumber, $firstName, $lastName, $email, $username, $password, $avatar, $test;
    public $count = 0;
    public $showDropdown = false;

    protected $rules = [
        'phoneNumber' => 'required|min:9',
        'firstName' => 'required|string',
        'lastName' => 'required|string',
        'email' => 'required|email',
        'username' => 'required|string',
        'password' => 'required|string',
    ];

    private function resetUploadInput()
    {
        $this->avatar = null;
    }

    public function updated()
    {
        $this->validateOnly('phoneNumber', ['phoneNumber' => 'required|min:9'], $messages = [], $attributes = []);
        $this->validateOnly('firstName', ['firstName' => 'required|string'], $messages = [], $attributes = []);
        $this->validateOnly('lastName', ['lastName' => 'required|string'], $messages = [], $attributes = []);
        $this->validateOnly('email', ['email' => 'required|email'], $messages = [], $attributes = []);
        $this->validateOnly('username', ['username' => 'required|string'], $messages = [], $attributes = []);
        $this->validateOnly('password', ['password' => 'required|string'], $messages = [], $attributes = []);
        $this->validateOnly('avatar', ['avatar' => 'required'], $messages = [], $attributes = []);
    }

    public function render()
    {
        return view('livewire.register.register-form-component');
    }

    public function submit(){
        $this->validate($this->rules);
    }

    public function upload()
    {
        $this->validate([
            'avatar' => 'required', // 1MB Max
        ]);

        $this->avatar->store('Uploads');
        $this->resetUploadInput();
    }

    public function increment()
    {
        $this->count++;
    }

    public function archive()
    {
        $this->showDropdown = false;
    }

    public function delete()
    {
        $this->showDropdown = false;
    }
}
