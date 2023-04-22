<li class="list-group-item d-flex justify-content-between">
    <span class="d-flex align-items-center fs-3 fw-semibold">{{ $user->name }}</span>
    <div class="d-flex col-6 justify-content-end align-items-center text-center">
        @livewire('user.card-list', ['card' => $user->card])
        @livewire('user.clear-card', ['user' => $user])
    </div>
</li>
