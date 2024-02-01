<x-layout>
    <x-header title="{{__('ui.categoria')}}:  {{__('ui.' . $category->name)}}"/>
        <div class="container px-0 px-md-3 px-lg-5 pb-4 my-4 container-annunci-custom shadow">
            <div class="row px-1 px-sm-5 mx-0 mx-md-3 mx-md-5 flex-wrap">
                @forelse ($category->products as $product)
                    @if ($product->is_accepted)
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
                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <small class="card-text">{{__('ui.inserito')}}: <strong>{{$product->user->name}}</strong></small>

                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    @else
                    <div class="col-12 d-flex flex-column align-items-center mt-5">
                        <x-zero-items/>
                    </div>
                    @endif
                @empty
                <div class="col-12 d-flex flex-column align-items-center mt-5">
                        <x-zero-items/>
                    </div>
                @endforelse
            </div>
        </div>
</x-layout>