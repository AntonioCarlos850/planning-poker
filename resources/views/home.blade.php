@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4 align-middle align-items-middle">
        @if (Route::has('login'))
            <div class="row justify-content-end">
                @auth
                    <form action="{{ route('logout') }}" method="post" class="col-1">
                        @csrf
                        <button type="submit" class="btn btn-link">
                            Logout
                        </button>
                    </form>
                @else
                    <div class="col-1">
                        <a href="{{ route('login') }}" class="btn btn-success">Log in</a>
                    </div>
                @endauth
            </div>
        @endif
    </div>
@endsection
