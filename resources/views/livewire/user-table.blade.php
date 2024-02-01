<div>
    <div class="container mt-3 mt-md-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <input type="text" wire:model.live='search' class="form-control" placeholder="{{__('ui.ricercaNome')}}">
            </div>
            <div class="col-12 text-center mt-4 table-responsive">
                <table class="table table-body-tertiary">
                    <thead class="">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('ui.nome')}}</th>
                        <th scope="col">{{__('ui.cognome')}}</th>
                        <th scope="col">email</th>
                        <th scope="col">{{__('ui.vediProfilo')}}</th>
                        <th scope="col">{{__('ui.delete_addRevisor')}}</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($users as $user)
                            @if (!$user->is_revisor)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->surname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td><a href="{{route('profile.index', $user)}}"><i class="fs-6 fa-solid fa-arrow-up-right-from-square text-color2 icon-anim"></i></a></td>
                                    <td><a href="{{route('admin.newRevisorAccepted', compact('user'))}}" class="ms-2 p-2 text-color2 "><i class="fa-solid fa-user-plus icon-anim"></i></a></td>
                                </tr>

                            @else
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->surname}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a href="{{route('profile.index', $user)}}"><i class="fs-6 fa-solid fa-arrow-up-right-from-square text-color2 icon-anim"></i></a>
                                </td>
                                <td>
                                    <form action="{{route('admin.removeRevisor', compact('user'))}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class=" ms-2 btn btn-light bg-transparent border-0 p-0 text-danger"><i class="fa-solid fa-xmark icon-anim fs-5"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
