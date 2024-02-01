<h4 class="fst-italic">{{__('ui.noAnnuncio')}}</h4>
<div class="d-flex gap-2 mt-4">
    @if(Route::CurrentRouteName() != 'home')
    <a href="{{route('home')}}" class="btn btn-custom-color2 rounded-pill">{{__('ui.backHome')}}</a>
    @endif
    <a href="{{route('create')}}" class="btn btn-crea-ann rounded-pill">{{__('ui.creaAnnuncio')}}</a>
</div>
