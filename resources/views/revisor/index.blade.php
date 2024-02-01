<x-layout>
    <div class="container">
        <div class="row justify-content-center text-center">
            <x-header title="{{__('ui.revisorDash')}}"/>
        </div>
    </div>
    <div class="container mt-3 min-vh-100">
        <div class="row justify-content-center mt-5 pt-2">
            <div class="col-12 col-md-9 col-lg-7 accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item rounded-top-4 accordion-scheda shadow">
                  <h2 class="accordion-header text-color3">

                    <button class="accordion-button accordion-scheda rounded-top-4 text-color3 text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                      {{__('ui.annunciDaRevision')}}
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body px-1">

                        <div class="container">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{__('ui.titoloAnnuncio')}}</th>
                                            <th scope="col">{{__('ui.prezzo')}}</th>
                                            <th scope="col">{{__('ui.visualizza')}}</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productstoBeRewiewed as $product)
                                            <tr>
                                                <th scope="row">{{$product->id}}</th>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->price}} &euro;</td>
                                                <td><a href="{{route('revisor.show', compact('product'))}}" class=""><i class="fs-6 fa-solid fa-arrow-up-right-from-square text-color2 icon-anim"></i></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>

                    </div>
                  </div>
                </div>
                <div class="accordion-item  rounded-bottom-4 accordion-scheda shadow">
                  <h2 class="accordion-header text-color3">
                    <button class="accordion-button collapsed accordion-scheda rounded-bottom-4 text-color3 text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                      {{__('ui.annunciRevision')}}
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body px-1">

                        <div class="container">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <hr class="my-3">
                                    <h6 class="text-success text-uppercase">{{__('ui.annunciAccettati')}}</h6>
                                    <hr class="my-3">
                                </div>
                                <div class="col-12 text-center">
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{__('ui.titoloAnnuncio')}}</th>
                                            <th scope="col">{{__('ui.prezzo')}}</th>
                                            <th scope="col">{{__('ui.visualizza')}}</th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productsAlreadyRewiewed as $product)
                                            <tr>
                                                <th scope="row">{{$product->id}}</th>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->price}} &euro;</td>
                                                <td><a href="{{route('revisor.reviewedshow', compact('product'))}}" class=""><i class="fs-6 fa-solid fa-arrow-up-right-from-square text-color2 icon-anim"></i></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                      </table>
                                </div>
                                <div class="col-12 text-center">
                                    <hr class="my-3">
                                    <h6 class="text-danger text-uppercase">{{__('ui.annunciDeclinati')}}</h6>
                                    <hr class="my-3">
                                </div>
                                <div class="col-12 text-center">
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{__('ui.titoloAnnuncio')}}</th>
                                            <th scope="col">{{__('ui.prezzo')}}</th>
                                            <th scope="col">{{__('ui.visualizza')}}</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productsDeleted as $product)
                                            <tr>
                                                <th scope="row">{{$product->id}}</th>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->price}} &euro;</td>
                                                <td><a href="{{route('revisor.reviewedshow', compact('product'))}}" class=""><i class="fs-6 fa-solid fa-arrow-up-right-from-square text-color2 icon-anim"></i></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>

                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</x-layout>