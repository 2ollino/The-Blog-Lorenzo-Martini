<x-layout>
    <x-nav />
    <div class="container my-3 bg-body-tertiary p-4 rounded-3">
        <div class="row">
            <div class="col-12 col-md-6">
                <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}">
            </div>
            <div class="col-12 col-md-6">
                <h2>{{ $article->title }}</h2>
                <div>

                    <p class="card-subtitle">{{ $article->subtitle }}</p>
                    <span class="small text-muted">Categoria:
                        <a href="{{route('article.byCategory', $article->category)}}" class="text-decoration-none text-capitalize">{{ $article->category->name }}</a>
                    </span>
                </div>
                <div class="col-6">
                    <p>{{ $article->body }}</p>
                </div>
                <div class="col-6">
                    <span class="text-muted">Redatto il {{ $article->created_at->format('d/m/Y') }} <br>
                        da <a class="text-decoration-none" href="#">{{ $article->user->name }}</a></span>
                </div>

                <div>
                    <span><a class="text-decoration-none" href="{{ route('article.index') }}">Torna alla lista degli
                            articoli</a></span>
                </div>

            </div>
        </div>
    </div>
</x-layout>
