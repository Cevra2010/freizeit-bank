<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Home extends Component
{

    public $selectedUser;
    public $userPassword;

    public $username;
    public $password;
    public $name;
    public $admin = 0;

    public function render()
    {
        $users = User::all();
        return view('livewire.user.home',[
            'users' => $users,
        ]);
    }

    public function selectUser(User $user) {
        $this->selectedUser = $user;
    }

    public function savePassword() {
        $this->selectedUser->password = Hash::make($this->userPassword);
        $this->selectedUser->save();
        $this->selectedUser = null;
    }

    public function delete(User $user) {
        $user->delete();
    }

    public function submit() {
        $this->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'name' => 'required',
        ]);

        $user = new User();
        $user->username = $this->username;
        $user->password = Hash::make($this->password);
        $user->name = $this->name;
        $user->admin = $this->admin;

        $user->save();

        $this->username = null;
        $this->password = null;
        $this->name = null;
        $this->admin = 0;
    }
}
