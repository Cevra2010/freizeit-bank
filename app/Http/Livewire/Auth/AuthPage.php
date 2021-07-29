<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AuthPage extends Component
{

    public $username;
    public $password;

    public function render()
    {
        return view('livewire.auth.auth-page');
    }

    public function submit() {
        if(Auth::attempt(['username' => $this->username,'password'=>$this->password])) {
            $this->redirectRoute("home");
        }
        else {
            session()->flash('auth_error','Benutzername und / oder Passwort sind nicht korrekt.');
        }
    }
}
