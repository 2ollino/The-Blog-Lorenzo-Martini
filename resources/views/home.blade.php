<x-layout>
    <livewire:crypto-ticker />
    <x-nav />
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="container p-4 bg-body-tertiary my-3 rounded-3">
        <div class="row justify-content-center align-items-center">
            @foreach ($articles as $article)
                <div class="col-3">
                    <x-card :article="$article" />
                    
                </div>
            @endforeach
        </div>
    </div>


</x-layout>
