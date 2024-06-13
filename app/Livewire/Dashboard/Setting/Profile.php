<?php

namespace App\Livewire\Dashboard\Setting;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class Profile extends Component
{
    use WithFileUploads;
    protected $listeners = ['user-updated' => 'render'];
    public $user;
    // bagusnya pakai array untuk user , tapi ebih enak gini
    public $foto;
    public $data;

    #[Validate('nullable|string|min:8')]
    public $newPassword;
    protected $rules = [
        'data.nama' => 'required|string|max:255',
        'data.email' => 'required|email',
        'data.telp' => 'required',
    ];

    public function render()
    {
        $this->user = Auth::user();
        $this->data = collect($this->user)->toArray();
        return view('livewire.dashboard.setting.profile');
    }



    public function update()
    {
        $this->validate();
        if ($this->foto != null) {
            // Generate a unique name for the image with original extension
            $imageName = time() . '_' . uniqid() . '.' . $this->foto->getClientOriginalExtension();

            // Store the uploaded image in the 'public' disk with the generated name
            $imagePath = $this->foto->storeAs('user', $imageName, 'public');
            Storage::disk('public')->delete($this->data['foto']);
        } else {
            $imagePath = $this->data['foto'];
        }
        $this->data['foto'] = $imagePath;
        try {
            $this->user->update($this->data);
            flash()->success('Updated Success');
        } catch (\Exception $e) {
            flash()->error('Internal Server Error');
        } finally {
            $this->dispatch('user-updated');
        }
    }

    public function updatePassword()
    {
        $this->validate();

        if ($this->newPassword) {
            try {
                $password = Hash::make($this->newPassword);
                $this->user->update(['password' => $password]);
                flash()->success('Change Password Success');
            } catch (\Exception $e) {
                flash()->error('Failed to Change Password');
            } finally {
                $this->pull('newPassword');
                $this->dispatch('user-updated');
            }
        } else {
            flash()->error('Failed To Update Password ');
        }
    }

    public function cancel()
    {
        $this->pull('newPassword', 'data', 'foto');
    }
}
