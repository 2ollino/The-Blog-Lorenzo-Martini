<x-layout>
    <x-nav/>
    <div class="container p-4 text center">
        <div class="row justify-content-center">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <h2>Richieste di lavoro da approvare</h2>
            <div class="col-4">
                <x-request-table :articles="$unrevisionedArticles"  />
            </div>
            <div class="col-4">
                <x-request-table :articles="$acceptedArticles" />
            </div>
            <div class="col-4">
                <x-request-table :articles="$rejectedArticles" />
            </div>
        </div>
    </div>
</x-layout>