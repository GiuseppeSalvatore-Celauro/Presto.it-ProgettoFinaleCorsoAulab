<x-layout>
<div class="container d-flex justify-content-center">
    {{-- @dd(Session::get('locale')) --}}
    <div class="row rounded-5 my-1 bg-header-home justify-content-center vhhome-custom">

        <div class="col-12 col-md-8 d-flex flex-column justify-content-center align-items-center">
            <h4 class="text-light animate__animated animate__fadeInDown font-logo mb-0 ombra-sottile ">pResto.it</h4>
            <h1 class="text-light font-logo display-1 ombra-sottile animate__animated animate__fadeInDown m-0">{{__('ui.slogan')}}:</h1>

            {{-- inizio SEARCH BAR --}}
                <form action="{{route('product.search')}}" class="col-12 col-lg-10 d-flex flex-row mt-2 mb-3" method="GET">
                    <input name="searched" class="form-control me-2" type="search" placeholder="{{__('ui.ricercaPresto')}}" aria-label="Search">
                    <button class="btn btn-cerca rounded-pill border border-light border-1 text-light" type="submit">{{__('ui.cerca')}}</button>
                </form>
            {{-- fine SEARCH BAR --}}
                @auth
                <div>
                    <small class="text-light mx-2 p-0 fst-italic">{{__('ui.oppure')}}</small><a href="{{route('create')}}" class="btn btn-crea-ann rounded-pill  ">{{__('ui.creaAnnuncio')}}</a>
                </div>
                @endauth
        </div>
    </div>
</div>

    @if (Session('conferma'))
    <div class="container">
        <div class="row alert alert-success">
            <div class="col-12">
                <ul>
                    <li>
                        {{session('conferma')}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endif
    {{-- INIZIO SEZIONE CATEGORIE --}}
    <div class="container-fluid">
        <div class="row justify-content-center">

            @foreach ($categories as $category)
                @if ($category->name == 'Arredamento')
                    <div class="col-md-2 d-none d-md-block">
                    <li id="img_1" class="card-Categorie text-center d-flex align-items-center justify-content-center">
                        <a class="link-cat" href="{{route('category.index', compact('category'))}}">
                            <h6 class="h6-cat text-lowercase text-lowercase">{{__("ui.$category->name")}}</h6>
                        </a>
                    </li>
                </div>
                @endif
                @if($category->name == 'Libri')
                <div class="col-md-2 d-none d-md-block">
                    <li id="img_2" class="card-Categorie text-center d-flex align-items-center justify-content-center">
                        <a class="link-cat" href="{{route('category.index', compact('category'))}}">
                            <h6 class="h6-cat text-lowercase">{{__("ui.$category->name")}}</h6>
                        </a>
                    </li>
                </div>
                @endif
                @if($category->name == 'Giocattoli')
                <div class="col-md-2 d-none d-md-block">
                    <li id="img_4" class="card-Categorie text-center d-flex align-items-center justify-content-center">
                        <a class="link-cat" href="{{route('category.index', compact('category'))}}"">
                        <h6 class="h6-cat text-lowercase">{{__("ui.$category->name")}}</h6>
                        </a>
                    </li>
                </div>
                @endif
                @if($category->name == 'Auto')
                <div class="col-md-2 d-none d-md-block">
                    <li id="img_5" class="card-Categorie text-center d-flex align-items-center justify-content-center">
                        <a class="link-cat" href="{{route('category.index',  compact('category'))}}">
                            <h6 class="h6-cat text-lowercase">{{__("ui.$category->name")}}</h6>
                        </a>
                    </li>
                </div>
                @endif
                @if($category->name == 'Abbigliamento')
                <div class="col-md-2 d-none d-md-block">
                    <li id="img_3" class="card-Categorie text-center d-flex align-items-center justify-content-center">
                        <a class="link-cat" href="{{route('category.index',  compact('category'))}}">
                            <h6 class="h6-cat text-lowercase">{{__("ui.$category->name")}}</h6>
                        </a>
                    </li>
                </div>
                @endif
            @endforeach
        </div>
    </div>
    {{-- INIZIO SEZIONE CARD ANNUNCI --}}
    <div class="container mt-4 container-custom">
        <div class="row justify-content-center">

            <div class="col-12 text-center">
                <h4 class="font-logo text-start h4-custom pe-4 ps-2 pb-2">{{__('ui.scopriNew')}}<i class="ps-2 fa-solid fa-face-grin-stars text-color1"></i></h4>
            </div>

            {{-- con swiper --}}
            <div class="col-12 mt-1 p-0">
                <div class="container-wrapper shadow px-1 px-lg-5">
                    @forelse ($products as $product)
                    <div class="card-container-custom shadow border-body-tertiary border-start border-end border-1">
                        <a href="{{route('product.show', compact('product'))}}" class="text-color3">
                        @if ($product->images()->first())
                        <img src="{{$product->images()->first()->getUrl(400,300)}}" class="card-img-top card-img-swiper mt-4" alt="">
                        @else
                        <img src="/img/default.jpg" class="card-img-top card-img-swiper mt-4" alt="...">
                        @endif
                        <div class="card-body-swiper d-flex flex-column justify-content-between">
                            <div class="d-flex justify-content-between mt-3">
                                <h5 class="card-title"><strong>{{$product->name}}</strong></h5>
                                <h5 class="Prezzo p-1">{{$product->price}} &euro; </h5>
                            </div>
                            <div class="d-flex align-items-start flex-column justify-content-end">
                                <p class="m-0 card-text ">{{__('ui.categoria')}}: <strong><a href="{{route('category.index', $product->category)}}" class="a-card text-color2">{{__("ui." . $product->category->name)}}</a></strong></p>
                                <small class="card-text">{{__('ui.inserito')}}: <a href="{{route('profile.index', $product->user)}}" class="text-color3"><strong>{{$product->user->name}}</strong></a></small>
                            </div>
                            <div class="d-flex flex-row justify-content-between align-items-center">


                            </div>
                        </div>
                        </a>
                    </div>
                    @empty
                    <div class="d-flex flex-column align-items-center w-100">
                        <x-zero-items/>
                    </div>
                    @endforelse
                    <button class="btn-before-custom"><</button>
                    <button class="btn-after-custom">></button>
                </div>
            </div>
        </div>
    </div>
    {{-- FINE SEZIONE CARD ANNUNCI --}}


    {{-- INIZIO SEZIONE STATISTICHE --}}
    <div class="container mt-4 container-custom">

        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h4 class="font-logo text-start h4-custom pe-4 ps-2 pb-2">{{__('ui.success')}}!</h4>
            </div>
        </div>

        <div class="row flex-row mt-2 justify-content-center">

                <div class="col-5 col-sm-4 col-md-3 mb-3">
                    <div class="div-stat rounded-4 l-bg-cyan l-bg-blue-dark d-flex flex-column py-2 pe-auto">

                        <div class="Statistiche-icon Statistiche-icon-large div-stat-icon mx-3">
                            <i class="fa-brands fa-instagram fs-1 text-color1"></i>
                        </div>

                        <div class="text-light text-end pe-2">
                            <h4 class="m-0 fs-1 fw-bold">10 K</h4>
                            <h5 class="Statistiche-title m-0 text-light fw-light">followers</h5>
                        </div>
                    </div>
                </div>

                <div class="col-5 col-sm-4 col-md-3 mb-3">
                    <div class="div-stat rounded-4 l-bg-cyan l-bg-blue-dark d-flex flex-column py-2 pe-auto">

                        <div class="Statistiche-icon Statistiche-icon-large div-stat-icon mx-3">
                            <i class="fas fa-bullhorn fs-1 text-color1"></i>
                        </div>

                        <div class="text-light text-end pe-2">
                            <h4 class="m-0 fs-1 fw-bold" id="PrimoNumero">0</h4>
                            <h4 class="d-none invisible" id="totProducts">{{$totProducts}}</h4>
                            <h5 class="Statistiche-title m-0 text-light fw-light">{{__('ui.annunciInserted')}}</h5>
                        </div>
                    </div>
                </div>

                <div class="col-5 col-sm-4 col-md-3 mb-3">
                    <div class="div-stat rounded-4 l-bg-cyan l-bg-blue-dark d-flex flex-column py-2 pe-auto">

                        <div class="Statistiche-icon Statistiche-icon-large div-stat-icon mx-3">
                            <i class="fas fa-users fs-1 text-color1"></i>
                        </div>

                        <div class="text-light text-end pe-2">
                            <h4 class="m-0 fs-1 fw-bold" id="SecondoNumero">0</h4>
                            <h4 class="d-none invisible" id="totUsers">{{$totUsers}}</h4>
                            <h5 class="Statistiche-title m-0 text-light fw-light">{{__('ui.usersRegist')}}</h5>
                        </div>
                    </div>
                </div>

                <div class="col-5 col-sm-4 col-md-3 mb-3">
                    <div class="div-stat rounded-4 l-bg-cyan l-bg-blue-dark d-flex flex-column py-2 pe-auto">

                        <div class="Statistiche-icon Statistiche-icon-large div-stat-icon mx-3">
                            <i class="fa-solid fa-face-grin-stars fs-1 text-color1"></i>
                        </div>

                        <div class="text-light text-end pe-2">
                            <h4 class="m-0 fs-1 fw-bold">0</h4>
                            <h5 class="Statistiche-title m-0 text-light fw-light">{{__('ui.clientiSoddisf')}}</h5>
                        </div>
                    </div>
                </div>

            </div>
    </div>
    {{-- FINE SEZIONE STATISTICHE --}}

</x-layout>
