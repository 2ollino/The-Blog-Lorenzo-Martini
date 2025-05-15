<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        <h4>Richieste per il ruolo di {{ $role }}</h4>
        @foreach ($roleRequests as $user)
            <tr>

                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @switch($role)
                    
                        @case('amministratore')
                        
                            <form action="{{ route('admin.setAdmin', $user) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-primary">Accetta {{ $role }}</button>
                            </form>
                        @break

                        @case('revisore')
                            <form action="{{ route('admin.setRevisor', $user) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-primary">Accetta {{ $role }}</button>
                            </form>
                        @break

                        @case('scrittore')
                            <form action="{{ route('admin.setWriter', $user) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-primary">Accetta {{ $role }}</button>
                            </form>
                        @break
                    @endswitch
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
