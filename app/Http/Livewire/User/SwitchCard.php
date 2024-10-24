<?php

namespace App\Http\Livewire\User;

use App\Enums\Status;
use App\Models\Card;
use App\Models\Session;
use App\Models\User;
use Livewire\Component;

class SwitchCard extends Component
{
    public $session;

    public function show()
    {
        $this->session->status = Status::Show;
        $this->session->average = $this->session->users->reduce(function(?int $carry, User $user) {
            return $carry + $user->card?->value ?? 0;
        }, 0) / $this->session->users->count();

        $this->session->save();
        $this->emit('showCards');
    }

    public function hide()
    {
        $this->session->status = Status::Hide;
        $this->session->average = null;
        $this->session->save();
        User::where('card_id', '!=', null)->update(['card_id' => null]);
        $this->emit('hideCards');
    }

    public function mount()
    {
        $this->session = Session::first();
        auth()->user()->session()->associate($this->session);
        auth()->user()->save();
    }

    public function render()
    {
        if ($this->session->status == Status::Show) {
            return view('livewire.user.hide-card');
        }

        return view('livewire.user.show-card');
    }
}
