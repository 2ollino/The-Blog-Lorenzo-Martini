<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome Tag</th>
            <th scope="col">Articoli collegati </th>
            <th scope="col">Aggiorna</th>
            <th scope="col">Cancella</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($metaInfos as $metaInfo)
            <tr>
                <th scope="row">{{ $metaInfo->id }}</th>
                <td class="text-capitalize">{{ $metaInfo->name }}</td>

                <td class="">{{ $metaInfo->articles->count() }}</td>

                @if ($metaType == 'tags')
                    <td>
                        <form action="{{ route('admin.editTag', ['tag' => $metaInfo]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name" placeholder="Nuovo nome tag"
                                class="form-control d-inline w-50">
                            <button type="submit" class="btn btn-secondary">Aggiorna</button>
                        </form>

                    </td>
                    <td>
                        <form action="{{ route('admin.deleteTag', ['tag' => $metaInfo]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>

                    </td>
                @else
                    <td>
                        <form action="{{ route('admin.editCategory', ['category' => $metaInfo]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name" placeholder="Nuovo nome categoria"
                                class="form-control d-inline w-50">
                            <button type="submit" class="btn btn-secondary">Aggiorna</button>
                        </form>

                    </td>
                    <td>
                        <form action="{{ route('admin.deleteCategory', ['category' => $metaInfo]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>

                    </td>

                @endif
        </tr>
        @endforeach
    </tbody>
</table>
