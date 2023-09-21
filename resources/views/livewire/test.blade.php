<div>
    <input type="text" name="search" id="search" wire:model="search">
    @foreach ($users as $user)
        @livewire('test-user', ['user' => $user], key($user->id))
    @endforeach
</div>
