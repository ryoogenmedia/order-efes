<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ListUser extends Component
{
    protected $listeners = ["user-deleted" => "render"];
    public User $user;
    #[Validate('required|min:3')]
    public $nama;

    public $user_id;

    public $foto;

    #[Validate('required|numeric')]
    public $telp;
    #[Validate('required|email')]
    public $email;
    #[Validate('required|min:8')]
    public $password;

    public $isUpdate = false;
    public function mount(User $users)
    {
        $this->user = $users;
    }
    public function render()
    {
        return view('livewire.admin.user.list-user', [
            'users' => $this->user->latest()->get()
        ]);
    }
    public function save()
    {
        $this->validate();
    }

    public function deleteClick($id)
    {
        $this->user_id = $id;
    }

    public function delete()
    {
        if ($this->user_id != null) {
            try {
                if (User::find($this->user_id)->delete()) {
                    flash()->success('User Deleted');
                    $this->dispatch('user-deleted');
                } else {
                    flash()->error('Deleted Failed');
                }
            } catch (\Exception $e) {
                flash()->error('Internal Server Error');
            } finally {
                $this->pull('user_id');
            }
        } else {
            flash()->error('User id Not Found');
        }
    }
}
