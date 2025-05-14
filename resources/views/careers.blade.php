<x-layout>
    <x-nav2 />
    <div class="container p-4  ">
        <div class="row justify-content-center ">
            <div class="col-12 col-md-8 card p-4">
                <form action="{{ route('careers.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Per quale ruolo ti stai candidando?</label>
                        <select name="role" id="role" class="form-control">
                            <option selected disabled>Scegli il ruolo</option>
                            @if(!Auth::user()->is_admin)
                            <option value="admin" class="">Amministratore</option>
                            @endif
                            @if(!Auth::user()->is_revisor)
                            <option value="revisor" class="">Revisore</option>
                            @endif
                            @if(!Auth::user()->is_writer)
                            <option value="writer" class="">Scrittore</option>
                            @endif
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Perchè ti stai candidando per questo ruolo? Raccontacelo</label>
                        <textarea cols="30" rows="7" class="form-control" name="message">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class=" text-center">
                        <button type="submit" class="btn btn-primary">Candidati Ora!</button>
                    </div>

                </form>
                
            </div>
            <div class="col-12 col-md-4 p-4">
                <h4>Lavorando come <span class="fw-bold">amministratore</span></h4>
                <p>Ti occuperai di gestire le richieste di lavoro e di aggiungere e modificare le categorie</p>
                <h4>Lavorando come <span class="fw-bold">revisore</span></h4>
                <p>Ti occuperai di decidere se un articolo sia o meno valido di essere pubblicato</p>
                <h4>Lavorando come <span class="fw-bold">scrittore</span></h4>
                <p>Ti occuperai di fornire alla nostra commmunity il cuore dell'informazione</p>
            </div>
        </div>
    </div>
</x-layout>
