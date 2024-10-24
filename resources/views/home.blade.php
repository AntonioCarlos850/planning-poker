@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4 align-middle align-items-middle">
        @if (Route::has('login'))
            <div class="row justify-content-end">
                <div class="col">
                    <h1 class="h1 fw-bold">{{ __('Hello') }}, {{ auth()->user()->name }}</h1>
                </div>
                @auth
                    <form action="{{ route('logout') }}" method="post" class="col-3 col-lg-1">
                        @csrf
                        <button type="submit" class="btn btn-link fs-4">
                            Logout
                        </button>
                    </form>
                @else
                    <div class="col-3 col-lg-1">
                        <a href="{{ route('login') }}" class="btn btn-success">Log in</a>
                    </div>
                @endauth
            </div>
        @endif

        <div class="row justify-content-around mt-5 mx-2">
            @foreach ($cards as $card)
                <livewire:card :card="$card" :wire:key="'card-id-'.$card->id" />
            @endforeach

            @livewire('user.switch-card')

            <ul class="list-group mt-4">
                @foreach ($users as $user)
                    <livewire:user.lista :user="$user" :wire:key="'user-list-id-'.$user->id" />
                @endforeach
            </ul>
        </div>
    </div>
@endsection
