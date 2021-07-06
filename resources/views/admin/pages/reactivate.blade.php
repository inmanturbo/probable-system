<x-jet-confirmation-modal wire:model="confirmingReactivate">
    <x-slot name="title">
        {{ __('Reactivate Page') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you want to Reactivate') }} {{ $page->name ?? '' }} ?
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('confirmingReactivate')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-danger-button class="ml-2" wire:click="reactivatePage"
            wire:loading.attr="disabled">
            {{ __('Reactivate') }}
        </x-danger-button>
    </x-slot>
</x-jet-confirmation-modal>
