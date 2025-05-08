<div class="card cardText" >
    <a href="{{ route('article.show', $article) }}">
        <img src="{{ Storage::url($article->image) }}" class="card-img-top cardImg" alt="{{ $article->title }}">
    </a>

    <div class="card-body d-flex flex-column">
        <h5 class="card-title  fs-6">{{ $article->title }}</h5>
        <span class="card-subtitle">{{ $article->subtitle }}</span>
        <span class="small text-muted">Categoria: 
            <a href="{{route('article.byCategory', $article->category)}}" class="text-decoration-none text-capitalize">{{ $article->category->name }}</a>
        </span>
    </div>
    <div class="card-footer">
        <span>Redatto il {{ $article->created_at->format('d/m/Y')}} <br>
        da <a class="text-decoration-none" href="{{route('article.byUser', $article->user)}}">{{$article->user->name}}</a></span>
    </div>
</div>
