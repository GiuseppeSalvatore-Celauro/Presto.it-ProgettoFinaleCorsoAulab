<form action="{{route('setLocale',$lang)}}" method="post" class="d-inline">
    @csrf
    <button type="submit" class="btn">
        {{-- img BANDIERINA --}}
        <img class="icon-anim" src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="20" height="20" alt="">
        {{-- {{$lang}} --}}
    </button>
</form>

