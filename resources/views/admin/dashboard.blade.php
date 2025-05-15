<x-layout>
    <x-nav/>
    <div class="container p-4 text center card my-3">
        <div class="row justify-content-center">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <h2>Richieste di lavoro da approvare</h2>
            <div class="col-8  my-4 border-bottom  ">
                <x-requests-table :roleRequests="$adminRequests" role="amministratore" />
            </div>
            <div class="col-8 my-4 border-bottom">
                <x-requests-table :roleRequests="$revisorRequests" role="revisore" />
            </div>
            <div class="col-8 my-4 border-bottom">
                <x-requests-table :roleRequests="$writerRequests" role="scrittore" />
            </div>
            
        </div>
    </div>
</x-layout>