<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home', [
            'cards' => Card::all(),
            'users' => User::orderByDesc('last_login')->limit(config('app.num_of_users'))->get(),
        ]);
    }
}
