<?php

namespace App\Http\Livewire\Groups;

use App\Models\Group;
use Livewire\Component;

class Home extends Component
{

    public $group_field;

    public function render()
    {
        $groups = Group::all();
        return view('livewire.groups.home',[
            'groups' => $groups,
        ]);
    }

    public function submit() {
        if($this->group_field) {
            $group = new Group();
            $group->name = $this->group_field;
            $group->save();
            $this->group_field = null;
        }
    }

    public function delete(Group $group) {
        $group->delete();
    }
}
