<?php

namespace App\Http\Livewire\User;

use App\Enums\Status;
use App\Models\Card;
use App\Models\Session;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CardList extends Component
{
    public $card;
    public $user;
    public $show;
    public $session;
    public $isSelectedCard;

    protected $listeners = [
        'cardClicked' => 'changeSelectedCard',
        'showCards' => '$refresh',
        'hideCards' => '$refresh'
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

    public function mount($user)
    {
        $this->session = Session::first();
        $this->user = $user;
    }

    public function render()
    {
        $this->show = $this->session->status == Status::Show;
        $this->isSelectedCard = $this->user->card ? true : false;
        $this->card = $this->user->card ?? new Card(["value" => '']);

        return view('livewire.user.card-list');
    }
}
