<x-layout>
    <x-nav2 />
    <div class="container p-4 ">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-8 card p-4">
                <form class="row g-3" action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label class="form-label">Titolo</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label  class="form-label">Sottotitolo</label>
                        <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle') }}">
                        @error('subtitle')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label  class="form-label">Categoria</label>
                        <select name="category" id="category" class="form-control">
                            <option selected disabled>Scegli una categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" class="text-capitalize">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label  class="form-label">Immagine</label>
                        <input type="file" name="image" class="form-control" >
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label  class="form-label">Corpo del articolo</label>
                        <textarea type="text" class="form-control" cols="30" rows="7" name="body">{{ old('body') }}</textarea>
                        @error('body')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Inserisci articolo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>