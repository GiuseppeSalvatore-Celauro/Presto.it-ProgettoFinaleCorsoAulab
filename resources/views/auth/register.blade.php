<x-layout>
    <div class="container container-custom mt-3">
        <div class="row justify-content-start justify-content-lg-center">
            <div class="col-12 text-center">
                <h4 class="font-logo text-start h4-header pe-4 ps-2 pb-2 text-uppercase">{{__('ui.registrati')}}</h4>
            </div>
        </div>
    </div>
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="container container-form rounded-5 py-4 shadow">
                        <div class="row justify-content-start justify-content-md-center p-2">
                            <div class="col-12 col-md-9 col-lg-7 div-form p-3 p-sm-4 rounded-4 shadow">
                                <div class="col-12 d-flex flex-row justify-content-between">
                                    <div class="col-6 pe-2">
                                        <label for="firstName" class="form-label mt-2 mb-1 mt-2 mb-1">{{__('ui.nome')}}</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="firstName" name="name">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-6 ps-2">
                                        <label for="lastName" class="form-label mt-2 mb-1">{{__('ui.cognome')}}</label>
                                        <input type="text" class="form-control @error('surname') is-invalid @enderror" id="lastName" name="surname">
                                        @error('surname')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                                <div class="col-12">
                                    <label for="email" class="form-label mt-2 mb-1">Email </label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="tu@esempio.com" name="email">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-12">
                                    <label for="password" class="form-label mt-2 mb-1">Password</label>
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="password_confirmation" class="form-label mt-2 mb-1">{{__('ui.conferma')}} password</label>
                                    <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                                    @error('password_confirmation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <hr>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-custom-color1 text-color3 rounded-pill">{{__('ui.registrati')}}</button>
                                </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>