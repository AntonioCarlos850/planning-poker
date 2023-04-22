<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Lista extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.user.lista');
    }
}
