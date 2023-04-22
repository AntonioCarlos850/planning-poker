<?php

namespace App\Http\Livewire\User;

use App\Models\Card;
use App\Models\User;
use Livewire\Component;

class ClearCard extends Component
{
    public User $user;

    public function disassociate()
    {
        $this->emit('disassociateCard');
        $this->user->card()->disassociate();
        $this->user->save();
    }

    public function render()
    {
        return view('livewire.user.clear-card');
    }
}
