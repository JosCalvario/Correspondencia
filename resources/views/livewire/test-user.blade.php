<div>
    <x-button wire:click="$set('open',true)">
        hola
    </x-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            {{$user->name}}
        </x-slot>
        <x-slot name="content">
            
        </x-slot>
        <x-slot name="footer">

        </x-slot>
    </x-dialog-modal>
</div>
