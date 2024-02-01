<x-layout>
    <div class="container-fluid shadow rounded-top-5 rounded-bottom-5 container-lg">
        <div class="row justify-content-between bg-profile-custom rounded-top-5 rounded-bottom-5">
            <div class="col-12 bgimg-profile-custom rounded-top-5 opacity-75" style="background-color: var(--color2)">
            </div>
            <div class="col-12 col-md-5 col-lg-4 ps-3 ps-md-5 mb-2 mb-md-5 information-profile-custom">
                <div class="col-12 text-center shadow mt-3 p-4">
                    <img src="{{Storage::url($user->profile->profile_pic)}}" alt="..." class="rounded-circle p-2 img-profile-custom">
                    <hr>
                    <h5 class="text-color3 text-uppercase fs-6">{{__('ui.personalInfo')}}</h5>
                    <hr>
                    <ul class="ul-profile-custom text-start gap-2">
                        <li class="fw-bold"><i class="fa-solid fa-user text-color2 pe-2"></i>{{$user->name}} {{$user->surname}}</li>
                        <li><span class="fw-bold"><i class="fa-regular fa-envelope text-color2 fs-6 pe-2"></i>{{$user->email}}</span></li>
                        <li><span class="fw-bold"><i class="fa-solid fa-phone text-color2 fs-6 pe-2"></i>
                            @if($user->profile->contacts == 0){{__('ui.noInsert')}}
                            @else{{$user->profile->contacts}}
                            @endif
                        </span></li>
                        <li><span class="fw-bold">{{__('ui.origine')}}: </span>{{$user->profile->country}}</li>
                        <li><span class="fw-bold">{{__('ui.collabDal')}}: </span> {{$user->created_at->format('d/m/y')}}</li>
                    </ul>
                    <hr>
                    <ul class="ul-profile-custom text-start gap-2">
                        <li><a href="{{route('personalProduct', $user)}}"><i class="fs-6 fa-solid fa-arrow-up-right-from-square text-color2 icon-anim"></i><span class="text-color3 text-start fs-6 ps-2 fw-bold">{{__('ui.vediInsert')}}</span></a></li>


                        @auth
                            @if (Auth::user()->id == $user->id)
                            <li>
                                <button type="button" class="btn-none ps-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fs-6 fa-solid fa-gear text-color2 icon-anim"></i><span class="text-color3 fs-6 ps-2 fw-bold">{{__('ui.impostazioni')}}</span>
                                </button>

                                <form action="{{route('profile.edit', compact('profile'))}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content modal-base rounded-bottom-5 p-4">
                                                <div class="modal-header">
                                                    <h1 class="modal-title text-color3 text-uppercase fs-6" id="exampleModalLabel">{{__('ui.modifImpost')}}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="">
                                                        <label class="form-label mt-2 mb-1">{{__('ui.profilePic')}}</label>
                                                        <input type="file" class="form-control" name="profile_pic">
                                                    </div>
                                                    <div class="">
                                                        <label class="form-label mt-2 mb-1">{{__('ui.paese')}}</label>
                                                        <input type="text" class="form-control" name="country" value="{{$user->profile->country}}">
                                                    </div>
                                                    <div class="">
                                                        <label class="form-label mt-2 mb-1">{{__('ui.contatto')}}</label>
                                                        <input type="number" class="form-control" name="contact" value="{{$user->profile->contacts}}">
                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn rounded-pill btn-custom-color3" data-bs-dismiss="modal">{{__('ui.chiudi')}}</button>
                                                    <button type="submit" class="btn btn-custom-color2 rounded-pill">{{__('ui.aggiorna')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                    </ul>
                    <hr>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <div class="d-flex flex-row justify-content-end mt-5">
                                    <button class="nav-link animazione-offCanvas logout-link">Logout<i class="ms-2 fa-solid fa-arrow-right-from-bracket text-color2"></i></button>
                                </div>
                            </form>
                            @endif
                        @endauth
            </div>
            </div>
            <div class="col-12 col-md-6 col-lg-7 me-4 mt-1 mt-md-5 mb-5 mb-md-5 shadow">
                <div class="row">
                    <h2 class="text-center font-logo text-uppercase fs-4 pt-2">
                        {{__('ui.lastInsert')}}
                    </h2>
                </div>
                    <hr class="mx-4">
                <div class="row  mb-3">
                    @forelse ($products as $product)
                    <div class="col-12 col-sm-6 col-md-6 col-xl-4 m-0 p-0 border-bottom border-1 py-0">
                        <a href="{{route('product.show', compact('product'))}}" class="text-color3">
                        <div class="card-annunci-custom p-5 p-sm-3 p-md-3 d-flex flex-column justify-content-center">
                            <div class="card-img-custom">
                                @if ($product->images()->first())
                                    <img src="{{$product->images()->first()->getUrl(400,300)}}" class=" w-100" alt="">
                                @else
                                    <img src="/img/default.jpg" class="w-100" alt="...">
                                @endif
                            </div>
                            <div class="card-body-custom d-flex flex-column justify-content-between">
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
                    <div class="d-flex flex-column align-items-center w-100">
                        <x-zero-items/>
                    </div>
                    @endforelse
                </div>
                <div class="row">
                    <h2 class="text-center font-logo text-uppercase fs-5 pt-2">
                        <i class="fa-regular fa-star me-2 text-uppercase"></i>{{__('ui.recensioni')}}<i class="ms-2 fa-regular fa-star"></i>
                    </h2>
                </div>
                <hr class="mx-4">
                <div class="row">
                    @auth
                    <div class="col-12 m-0 p-0 py-0">
                        <form action="{{route('comment.create', compact('user'))}}" method="post">
                            @csrf
                            <div class="d-flex flex-row px-3 py-2 justify-content-between">
                                <input type="text" placeholder="{{__('ui.scriviRecensioni')}}..." class="form-control-custom p-3 rounded" name="comment">
                                <button type="submit" class="btn btn-invia rounded-pill">{{__('ui.invia')}}</button>
                            </div>
                        </form>
                    </div>
                    @endauth
                    <div class="col-12 d-flex flex-column shadow rounded py-2 gap-3">
                        @foreach ($user->ordinamento() as $comment)
                            @if ($comment->profile_id == $user->profile->id)
                            <div class="d-flex justify-content-start border-bottom pb-2">
                                <div class="col-4">
                                    <div class="d-flex align-items-center justify-content-start gap-3">
                                        <img src="{{Storage::url($comment->user->profile->profile_pic)}}" alt="" class="rounded-circle imgCommenti-profile-custom">
                                        <h5 class="mb-0 ">{{$comment->user->name}} {{$comment->user->surname}}</h5>
                                    </div>
                                </div>

                                <div class="col-8 d-flex align-items-center">
                                    <p class="pe-2 mb-0">{{$comment->comment}}</p>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>