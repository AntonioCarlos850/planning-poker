<?php

namespace App\Http\Livewire\User;

use App\Models\Card;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CardList extends Component
{
    public $card;
    public $user;
    public $show;
    public $isSelectedCard;

    protected $listeners = [
        'cardClicked' => 'changeSelectedCard',
        'showCards' => 'show',
        'hideCards' => 'hide'
    ];

    protected function isSelected($card)
    {
        return $this->user->card_id == $card->id;
    }

    public function changeSelectedCard(Card $card)
    {
        if ($this->isSelected($card)) {
            $this->card = $card;
            $this->isSelectedCard = true;
        }
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

    public function mount($user)
    {
        $this->show = false;
        $this->user = $user;
    }

    public function render()
    {
        $this->isSelectedCard = $this->user->card ? true : false;
        $this->card = $this->user->card ?? new Card(["value" => '']);

        return view('livewire.user.card-list');
    }
}
