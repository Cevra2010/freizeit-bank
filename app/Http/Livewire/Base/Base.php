<?php

namespace App\Http\Livewire\Base;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Base extends Component
{

    public $show = 'home';

    public $listeners = [
        'menu_clicked' => 'show',
    ];

    public function render()
    {
        if(Auth::check()) {
            $auth = true;
        }
        else {
            $auth = false;
        }

        return view("livewire.base.base",[
            'auth' => $auth
        ]);
    }

    public function show($section) {
        if($section == "logout") {
            Auth::logout();
        }
        $this->show = $section;
    }
}
