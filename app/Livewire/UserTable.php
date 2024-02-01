<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserTable extends Component
{
    public $search;

    public function render()
    {
        if ($this->search == '') {
            $users = User::all();
        }else{
            $users = User::where('name', 'LIKE', '%'.$this->search.'%')->get();
        }
        return view('livewire.user-table', compact('users'));
    }
}
