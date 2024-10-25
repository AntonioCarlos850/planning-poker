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
        $counter = 0;
        $sum = $this->session->users()->with('card')->get()->reduce(function(?float $carry, User $user) use (&$counter) {
            $value = $user->card?->value ?? 0;

            if ($value === '?') {
                return $carry;
            }

            if ($value === '1/2') {
                $value = 0.5;
            }

            $counter++;
            if ($value === '∞') {
                return 999999999;
            }

            return $carry + $value;
        }, 0);

        $this->session->average = $sum / $counter;

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
        $this->session->load('users', 'users.card');
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
