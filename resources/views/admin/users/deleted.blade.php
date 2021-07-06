<x-7xl>
    <x-slot name="header">
        {{__('Deleted Users')}}
    </x-slot>

    <x-slot name="headerActions">
        @include('admin.users.header-actions')
    </x-slot>

    <livewire:core::admin.users.livewire-datatable.datatable status="deleted" />
</x-7xl>

<livewire:core::admin.users.restore />
