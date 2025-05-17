<x-layout>
    <x-nav />
    <div class="container p-4 text center">
        <div class="row justify-content-center">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="col-10  my-4 border-bottom">
                <h2>Articoli da approvare</h2>
                <x-writer-articles-table :articles="$unrevisionedArticles" />
            </div>
            <div class="col-10  my-4 border-bottom">
                <h4>Articoli approvati</h4>
                <x-writer-articles-table :articles="$acceptedArticles" />
            </div>
            <div class="col-10  my-4 border-bottom">
                <h4>Articoli rifiutati</h4>
                <x-writer-articles-table :articles="$rejectedArticles" />
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="col-10">
                    <h2>Tutti i tags</h2>
                    <x-metainfo-table :metaInfos="$tags" metaType="tags" />
                </div>

            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="col-10">
                    <h2>Tutti le categorie</h2>
                    <form class="d-flex" action="{{ route('admin.storeCategory') }}" method="POST">
                        @csrf
                        <input type="text" class="form-control me-2" placeholder="Inserisci una nuova categoria"
                            name="name">
                        <button type="submit" class="btn btn-outline-secondary">Aggiungi</button>
                    </form>
                    <x-metainfo-table :metaInfos="$categories" metaType="categorie" />
                </div>

            </div>
        </div>
    </div>
</x-layout>
