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
                <x-request-table :roleRequests="$adminRequests" role="amministratore" />
            </div>
            <div class="col-4">
                <x-request-table :roleRequests="$revisorRequests" role="Revisore" />
            </div>
            <div class="col-4">
                <x-request-table :roleRequests="$writerRequests" role="Scrittore" />
            </div>
        </div>
    </div>
</x-layout>