<x-layout>
    <x-header title="{{__('ui.allProductsFrom')}}:"/>
    <div class="container px-0 px-md-3 px-lg-5 pb-4 my-4 container-annunci-custom shadow">
        <div class="row px-1 px-sm-5 mx-0 mx-md-3 mx-md-5 flex-wrap">
           @forelse ($products as $product)

            <div class="col-12 col-sm-6 col-md-6 col-xl-4 m-0 p-0 border-bottom border-1 py-0">
                <a href="{{route('product.show', compact('product'))}}" class="text-color3">
                <div class="card-annunci-custom p-5 p-sm-3 p-md-3">
                    <div class="card-img-custom">
                        @if ($product->images()->first())
                            <img src="{{$product->images()->first()->getUrl(400,300)}}" class=" w-100" alt="">
                        @else
                            <img src="/img/default.jpg" class="w-100" alt="...">
                        @endif
                    </div>
                    <div class="card-body-custom">
                        <div class="d-flex justify-content-between mt-3">
                            <h5 class="card-title"><strong>{{$product->name}}</strong></h5>
                            <h5 class="Prezzo p-1">{{$product->price}} &euro; </h5>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="m-0 card-text ">{{__('ui.categoria')}}: <strong><a href="{{route('category.index', $product->category)}}" class="a-card text-color2">{{__("ui." . $product->category->name)}}</a></strong></p>

                        </div>
                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <small class="card-text">{{__('ui.inserito')}}: <a href="{{route('profile.index', $product->user)}}" class="text-color3"><strong>{{$product->user->name}}</strong></a></small>
                        </div>
                    </div>
                </div>
                </a>
            </div>

           @empty
           <div class="col-12 d-flex flex-column align-items-center mt-5">
                <x-zero-items/>
            </div>
           @endforelse
        </div>
    </div>
    <div class="container">
        <div class="row">
            @auth
                <div class="d-flex justify-content-end">
                    <a href="{{route('create')}}" class="btn btn-crea-ann rounded-pill opacity-75">{{__('ui.creaNewAnnuncio')}}</a>
                </div>
            @endauth
        </div>
    </div>
</x-layout>