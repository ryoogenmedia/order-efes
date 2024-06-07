<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required')]
    public $username = '';

    #[Validate('required')]
    public $password = '';

    public $rememberMe = false;
    public $inputType = 'password';
    public $is_password = true;
    public function changeInputType()
    {
        if ($this->is_password == true) {
            $this->is_password = false;

            $this->inputType = 'text';
        } else {
            $this->is_password = true;
            $this->inputType = 'password';
        }
    }
    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login()
    {
        $this->validate();

        try {
            // Authenticate a regular user
            if (auth()->guard('web')->attempt(['email' => $this->username, 'password' => $this->password], $this->rememberMe)) {
                flash()->success('Login Success');
                return redirect()->route('dashboard.index');
            } else if (auth()->guard('admin')->attempt(['username' => $this->username, 'password' => $this->password], $this->rememberMe)) {
                flash()->success('Login Success');
                return redirect()->route('admin.index');
            } else {
                flash()->error('Failed Login');
            }
        } catch (\Exception $e) {
            flash()->warning('Internal Server Error');
        } finally {
            $this->pull(['username', 'password']);
        }
    }
}
