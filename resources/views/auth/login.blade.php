<x-layout>
    <x-nav2 />
    <div class="container pt-4  ">
        <div class="row justify-content-center align-items-center">
            <div class="col-8 card p-4">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control"  name="password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class=" text-center">
                        <button type="submit" class="btn btn-primary">Accedi</button>
                    </div>
                    
                </form>
                <div class=" text-center">
                    <span>Non sei ancora registrato? <a href="{{ route('register') }}">Registrati</a></span>
                </div>
            </div>

        </div>
    </div>
</x-layout>
