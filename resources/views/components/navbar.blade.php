@if(Route::CurrentRouteName() == 'product')
<nav class="navbar navbar-expand-lg bg-body-light" id = "navbar">
    <div class="container d-flex flex-row justify-content-between " >
        <a class="navbar-brand logo fs-1" href="{{ route('home')}}" id = "navbar2">pRESTO.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0 ms-xl-auto">
            <li class="nav-item">
                {{-- <div class="dd-cat px-3"> --}}
                    @foreach ($categories as $category)
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link bg-cat-custom" href="{{ route('category.index', compact('category')) }}">{{__("ui.$category->name")}}</a>
                        </li>
                    @endforeach
            </li>
            <li class="nav-item dropdown dd-cat-master d-block d-lg-none">
                <button class="nav-link navbar-link text-uppercase" data-bs-toggle="dropdown" aria-expanded="false">
                    {{__('ui.categories')}}
                </button>
                <ul class="dropdown-menu dd-cat1">
                    <div class="dd-cat px-3">
                    @foreach ($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link bg-cat-custom" href="{{ route('category.index', compact('category')) }}">{{__("ui.$category->name")}}</a>
                        </li>
                    @endforeach
                    </div>
                </ul>
            </li>
        </ul>
        @guest
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <button class="nav-link dropdown-toggle navbar-link-login" data-bs-toggle="dropdown" aria-expanded="false">
                    {{__('ui.accedi')}} | {{__('ui.registrati')}}
                </button>
                <div class="dropdown-menu dropdown-custom">
                    <form class="px-3 pt-3" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-1">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control mt-1 input-custom @error('email') is-invalid @enderror"
                            id="email" placeholder="tu@esempio.com" name="email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label mt-1">Password</label>
                            <input type="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" name="password">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="dropdown-divider p-0"></div>
                        <div class="d-flex flex-row justify-content-between align-items-center p-3 rounded-bottom">
                            <button type="submit" class="ms-2 btn bg-color2 btn-custom rounded-pill text-light">{{__('ui.accedi')}}</button>
                            <span class="me-2">{{__('ui.seiNuovo')}}<a class="text-color2 ps-1 navbar-link" href="{{ route('register') }}">{{__('ui.registrati')}}</a></span>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
        @else
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 position-relative">
            <button class="btn btn-user rounded-pill border" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">{{__('ui.ciao')}}<span class="px-2 fs-4">{{ Auth::user()->name }}</span><i class="fs-6 fa-solid fa-chevron-left text-color2"></i>
            </button>
            @if (Auth::user()->is_revisor && $toBeReviewed > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{$toBeReviewed}}</span>
            @endif
        </ul>
        @endguest
    </div>
</div>
</nav>
@else
<nav class="navbar navbar-expand-lg bg-body-light" id = "navbar">
    <div class="container d-flex flex-row justify-content-between " >
        <a class="navbar-brand logo fs-1" href="{{ route('home')}}" id = "navbar2">pRESTO.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
            <li class="nav-item">
                <a class="nav-link navbar-link text-uppercase" href="{{ route('product') }}">{{__('ui.annunci')}}</a>
            </li>
            <li class="nav-item dropdown dd-cat-master">
                <button class="nav-link navbar-link text-uppercase" data-bs-toggle="dropdown" aria-expanded="false">
                    {{__('ui.categories')}}
                </button>
                <ul class="dropdown-menu dd-cat1">
                    <div class="dd-cat px-3">
                    @foreach ($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link bg-cat-custom" href="{{ route('category.index', compact('category')) }}">{{__("ui.$category->name")}}</a>
                        </li>
                    @endforeach
                    </div>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <button class="nav-link text-color2" data-bs-toggle="dropdown" aria-expanded="false" ><i class="fa-solid fa-language fa-xl"></i> <i class="fa-solid fa-chevron-down"></i></button>
                <ul class="dropdown-menu dd-menu">
                    <div class="dd-lingue">
                        <li class="nav-item opacity-75">
                            <x-_locale lang="it" nation="it"/>
                        </li>
                        <li class="nav-item opacity-75">
                            <x-_locale lang="en" nation="gb"/>
                        </li>
                        <li class="nav-item opacity-75">
                            <x-_locale lang="pt" nation="pt"/>
                        </li>
                    </div>

                </ul>
            </li>
        </ul>
        @guest
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <button class="nav-link dropdown-toggle navbar-link-login" data-bs-toggle="dropdown" aria-expanded="false">
                    {{__('ui.accedi')}} | {{__('ui.registrati')}}
                </button>
                <div class="dropdown-menu dropdown-custom">
                    <form class="px-3 pt-3" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-1">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control mt-1 input-custom @error('email') is-invalid @enderror"
                            id="email" placeholder="tu@esempio.com" name="email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label mt-1">Password</label>
                            <input type="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" name="password">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="dropdown-divider p-0"></div>
                        <div class="d-flex flex-row justify-content-between align-items-center p-3 rounded-bottom">
                            <button type="submit" class="ms-2 btn bg-color2 btn-custom rounded-pill text-light">{{__('ui.accedi')}}</button>
                            <span class="me-2">{{__('ui.seiNuovo')}}<a class="text-color2 ps-1 navbar-link" href="{{ route('register') }}">{{__('ui.registrati')}}</a></span>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
        @else
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 position-relative">
            <button class="btn btn-user rounded-pill border" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">{{__('ui.ciao')}}<span class="px-2 fs-4">{{ Auth::user()->name }}</span><i class="fs-6 fa-solid fa-chevron-left text-color2"></i>
            </button>
            @if (Auth::user()->is_revisor && $toBeReviewed > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{$toBeReviewed}}</span>
            @endif
        </ul>
        @endguest
    </div>
</div>
</nav>
@endif