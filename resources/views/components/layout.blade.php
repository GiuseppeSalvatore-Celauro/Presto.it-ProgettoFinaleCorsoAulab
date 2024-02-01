<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @vite (['resources/css/app.css', 'resources/js/app.js'])

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <title>Presto.it</title>

  {{-- fonts --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Sansita:ital,wght@0,400;0,700;0,800;0,900;1,400;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
  <x-navbar/>
  {{-- @dd(Session::get('locale') = 'ciao') --}}
  @auth
  <div class="offcanvas offcanvas-end offcanvas-custom" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header ">
      <img src="{{Storage::url(Auth::user()->profile->profile_pic)}}" alt="..." class="rounded-circle img-profile-offcanvas">
      <a class="offcanvas-title nav-link text-uppercase me-5 btn p-2 rounded-pill shadow" href="{{route('profile.index', ['user'=>Auth::user()])}}" id="offcanvasRightLabel">My profile</a>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="p-0">
          <a class="nav-link  animazione-offCanvas"  href="{{route('personalProduct', Auth::user())}}">{{__('ui.myAnnunci')}}</a>
        <hr class="hr hr-blurry text-color1" />
        <a class="nav-link mt-3 animazione-offCanvas"  href="{{route('luckywheel')}}">{{__('ui.fortunato')}}</a>
        <hr class="hr hr-blurry text-color1" />
        <a class="nav-link mt-3 animazione-offCanvas"  href="{{route('request.newRevisor')}}">{{__('ui.lavoraConNoi')}}</a>
        <hr class="hr text-color3" />

        @if(Auth::user()->is_revisor && Auth::user()->is_admin)
        <a href="{{route('revisor.index')}}" class="nav-link animazione-offCanvas  position-relative">
          {{__('ui.revisorDash')}}
            @if (Auth::user()->is_revisor && $toBeReviewed > 0)
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{$toBeReviewed}}</span>
            @endif
        </a>
        <hr class="text-color1 my-1">
        <a href="{{route('admin.index')}}" class="nav-link animazione-offCanvas text-color2">{{__('ui.adminDash')}}</a>
        @elseif (Auth::user()->is_revisor)
        <a href="{{route('revisor.index')}}" class="nav-link animazione-offCanvas text-color2">{{__('ui.revisorDash')}}</a>
        @elseif(Auth::user()->is_admin)
        <a href="{{route('admin.index')}}" class="nav-link animazione-offCanvas text-color2">{{__('ui.adminDash')}}</a>
        <hr>
        @endif

        <form method="POST" action="{{route('logout')}}" class="nav-link w-100 ">
          @csrf
          <div class="d-flex flex-row justify-content-end mt-2">
            <button class="nav-link animazione-offCanvas logout-link" type="submit">Logout<i class="ms-2 fa-solid fa-arrow-right-from-bracket text-color2"></i></button>
          </div>
        </form>
      </ul>
    </div>
  </div>
  @endauth
  <div class="min-vh-100">
    {{$slot}}
  </div>
  <button type="button"class="btn btn-floating btn-lg" id="BottoneScrollUp">
    <i class="fas fa-arrow-up ArrowColor"></i>
</button>
  <x-footer/>

</body>
</html>