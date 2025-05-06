<x-layout>
    <livewire:crypto-ticker />
    <x-nav />
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</x-layout>
