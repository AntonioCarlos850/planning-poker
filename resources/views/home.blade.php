@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4 align-middle align-items-middle">
        @if (Route::has('login'))
            <div class="row justify-content-end">
                @auth
                    <form action="{{ route('logout') }}" method="post" class="col-3 col-lg-1">
                        @csrf
                        <button type="submit" class="btn btn-link">
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
                <livewire:card :card="$card" />
            @endforeach

            <div class="col-12 d-flex justify-content-end mt-4">
                @livewire('user.switch-card')
            </div>

            <ul class="list-group mt-4">
                @foreach ($users as $user)
                    <livewire:user.lista :user="$user" :wire:key="$user->id" />
                @endforeach
            </ul>
        </div>
    </div>
@endsection
