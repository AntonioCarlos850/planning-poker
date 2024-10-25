<ul class="list-group mt-4" wire:poll>
    @foreach ($users as $user)
        <livewire:user.lista :user="$user" :wire:key="'user-list-id-'.$user->id" />
    @endforeach
</ul>
