<?php

namespace App\Http\Livewire;

use App\Models\Card as ModelsCard;
use Livewire\Component;

class Card extends Component
{
    public $card;

    public function mount($card)
    {
        $this->card = $card ?? new ModelsCard(["value" => '']);
    }

    public function select()
    {
        $this->emit('cardClicked', $this->card);
        auth()->user()->card()->associate($this->card);
        auth()->user()->save();
    }

    public function render()
    {
        return view('livewire.card');
    }
}
