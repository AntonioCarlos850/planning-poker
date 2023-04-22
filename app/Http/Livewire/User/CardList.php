<?php

namespace App\Http\Livewire\User;

use App\Models\Card;
use Livewire\Component;

class CardList extends Component
{
    public $card;

    protected $listeners = [
        'cardClicked' => 'changeSelectedCard',
        'disassociateCard' => 'clearCard',
    ];

    public function changeSelectedCard(Card $card)
    {
        $this->card = $card;
    }

    public function clearCard()
    {
        $this->card = new Card(["value" => '']);
    }

    public function mount($card)
    {
        $this->card = $card ?? new Card(["value" => '']);
    }

    public function render()
    {
        return view('livewire.user.card-list');
    }
}
