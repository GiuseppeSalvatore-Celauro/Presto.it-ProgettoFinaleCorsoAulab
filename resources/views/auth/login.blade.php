<x-layout>
    <div class="container">
        <div class="row justify-content-center my-5">    
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">{{__('ui.accedi')}}</h4>
                <form method="POST" action="{{route('login')}}">
                    
                    @csrf

                    <div class="row g-3">
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="tu@esempio.com" name="email">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <button class="w-100 btn btn-primary btn-lg" type="submit">{{__('ui.accedi')}}</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>