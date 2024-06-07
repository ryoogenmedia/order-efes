<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Register extends Component
{
    #[Validate('required|min:3')]
    public $nama = '';

    #[Validate('required|numeric', message: 'Require Telepon Number')]
    public $telp = '';

    #[Validate('required|email|unique:users,email')]
    public $email = '';

    #[Validate('required|min:8')]
    public $password = '';

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
        return view('livewire.auth.register');
    }

    public function save()
    {
        $data =   $this->validate();
        try {
            if (User::create($data)) {
                flash()->success('Register Success');
                return redirect()->route('login');
            } else {
                flash()->error('Failed to Register');
            }
        } catch (\Exception $err) {
            flash()->error('Failed to Register');
        } finally {
            $this->pull([
                'nama', 'telp', 'email', 'password'
            ]);
        }
    }
}
