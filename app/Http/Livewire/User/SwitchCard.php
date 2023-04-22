<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class SwitchCard extends Component
{
    public $hide = false;

    public function show()
    {
        $this->emit('showCards');
        $this->hide = true;
    }

    public function hide()
    {
        $this->emit('hideCards');
        $this->hide = false;
        User::where('card_id', '!=', null)->update(['card_id' => null]);
    }

    public function render()
    {
        if ($this->hide) {
            return view('livewire.user.hide-card');
        }

        return view('livewire.user.show-card');
    }
}
