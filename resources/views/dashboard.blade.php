<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- <x-jet-welcome />-->
    <livewire:task-list />
</x-app-layout>
