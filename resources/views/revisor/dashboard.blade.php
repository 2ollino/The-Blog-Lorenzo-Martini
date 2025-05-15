<x-layout>
    <x-nav/>
    <div class="container p-4 text center">
        <div class="row justify-content-center">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            
            <div class="col-8  my-4 border-bottom">
                <h2>Articoli da approvare</h2>
                <x-articles-table :articles="$unrevisionedArticles"  />
            </div>
            <div class="col-8  my-4 border-bottom">
                <h4>Articoli approvati</h4>
                <x-articles-table :articles="$acceptedArticles" />
            </div>
            <div class="col-8  my-4 border-bottom">
                <h4>Articoli rifiutati</h4>
                <x-articles-table :articles="$rejectedArticles" />
            </div>
        </div>
    </div>
</x-layout>