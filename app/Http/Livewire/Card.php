<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Card extends Component
{
    public $card;
    public $isSelected;

    protected $listeners = [
        'cardClicked' => 'verifyIfIsSelected',
        'hideCards' => 'verifyIfIsSelected',
    ];

    public function mount($card)
    {
        $this->card = $card;
        $this->verifyIfIsSelected($card);
    }

    public function verifyIfIsSelected()
    {
        $this->isSelected = auth()->user()->card_id == $this->card->id;
    }

    public function select()
    {
        $this->isSelected = true;
        $this->emit('cardClicked', $this->card);
        auth()->user()->card()->associate($this->card);
        auth()->user()->save();
    }

    public function render()
    {
        return view('livewire.card');
    }
}
