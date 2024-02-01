<x-layout>
    <x-header title="{{__('ui.annuncio')}}: {{$product->name}}"/>
      <div class="container mt-2 mt-md-5 pb-5 container-annunci-custom rounded-5">
        <div class="row justify-content-center flex-row align-items-between">

            <div class="col-12 col-md-5 border-end d-flex align-items-center justify-content-center">

                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    @if ($product->images)
                    <div class="carousel-inner">
                      @foreach ($product->images as $img)
                      <div class="carousel-item @if($loop->first)active @endif">
                        <img src="{{$img->getUrl(400, 300)}}" class="w-100" alt="...">
                      </div>
                      @endforeach
                    </div>
                    @endif

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            {{-- fine CARROUSEL --}}

            <div class="col-12 col-md-4 mt-4 mt-md-0 d-flex flex-column justify-content-between">



                    <div class="d-flex justify-content-between flex-column">
                      <p class="text-uppercase bg-body-tertiary ps-1">{{__('ui.categoria')}}: <strong>{{__("ui." . $product->category->name)}}</strong> </p>
                        <h3 class=" fw-bold text-color3">{{$product->name}}</h3>
                        <span class="h3 fw-bold text-color2">{{$product->price}} &euro;</span>
                    </div>

                    <div class="d-flex flex-column justify-content-md-center align-items-end align-items-md-start">
                      <small>{{__('ui.inserito')}}:</small>
                      <div class="d-flex flex-row justify-content-start align-items-end">
                        <p class="fs-5 mb-0"><i class="fa-solid fa-user text-color2 pe-2 fs-6"></i><a href="{{route('profile.index', $product->user)}}" class="text-color3"><strong>{{$product->user->name}}</strong></a></p>
                      </div>
                    </div>
            </div>

            <div class="col-12 col-md-5 mt-4 bg-body-tertiary p-2 me-md-4">
              <p class="text-uppercase mx-auto fw-bold fs-5">{{__('ui.descrizione')}}:</p> <p>{{$product->description}}</p>
            </div>
            <div class="col-12 col-md-4">

            </div>
        </div>

      </div>
      <div class="container mt-2">
        <div class="row">
            @auth
                <div class="d-flex justify-content-end">
                    <a href="{{route('create')}}" class="btn btn-crea-ann rounded-pill opacity-75">{{__('ui.creaNewAnnuncio')}}</a>
                </div>
                @endauth
        </div>
    </div>
</x-layout>