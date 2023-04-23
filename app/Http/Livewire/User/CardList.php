<?php

namespace App\Http\Livewire\User;

use App\Models\Card;
use Livewire\Component;

class CardList extends Component
{
    public $card;
    public $show;
    public $isSelectedCard;

    protected $listeners = [
        'cardClicked' => 'changeSelectedCard',
        'showCards' => 'show',
        'hideCards' => 'hide'
    ];

    public function changeSelectedCard(Card $card)
    {
        $this->card = $card;
        $this->isSelectedCard = true;
    }

    public function clearCard()
    {
        $this->isSelectedCard = false;
        $this->card = new Card(["value" => '']);
    }

    public function show()
    {
        $this->show = true;
    }

    public function hide()
    {
        $this->show = false;
        $this->clearCard();
    }

    public function mount($card)
    {
        $this->show = false;
        $this->isSelectedCard = $card ? true : false;
        $this->card = $card ?? new Card(["value" => '']);
    }

    public function render()
    {
        return view('livewire.user.card-list');
    }
}
