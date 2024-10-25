<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class UserList extends Component
{
    public $users;

    public function getUsers()
    {
        $sessionId = auth()->user()->session_id;
        $this->users = User::orderByDesc('last_login')
            ->where('logged', true)->where('session_id', $sessionId)->get();
    }

    public function render()
    {
        $this->getUsers();
        return view('livewire.user.list');
    }
}
