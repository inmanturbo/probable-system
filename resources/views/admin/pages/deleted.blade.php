<x-7xl>
    <x-slot name="header">
        {{__('Pages')}}
    </x-slot>

    <x-slot name="headerActions">
        @include('admin.pages.header-actions')
    </x-slot>

    @include('admin.pages.table', [ 'status' => 'deleted' ])

    <livewire:core::admin.pages.restore />
</x-7xl>

