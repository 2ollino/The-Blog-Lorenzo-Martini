<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Sottotitolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Redattore</th>
            <th scope="col">Data di pubblicazione</th>
            <th scope="col">Tags</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->subtitle }}</td>
                <td>{{ $article->category->name ?? 'Nessuna Categoria' }}</td>
                <td>{{ $article->user->name }}</td>
                <td>{{ $article->created_at->format('d/m/Y') }}</td>
                <td>
                    @foreach ($article->tags as $tag)
                        #{{ $tag->name }}
                    @endforeach
                </td>
                <td>{{ $article->user->name }}</td>
                <td>
                    <a href="{{ route('article.show', $article) }}">Leggi l'articolo</a>
                    <a href="{{ route('writer.editArticle', $article) }}">Modifica</a>
                    <form action="{{ route('article.delete', $article) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">Elimina</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
