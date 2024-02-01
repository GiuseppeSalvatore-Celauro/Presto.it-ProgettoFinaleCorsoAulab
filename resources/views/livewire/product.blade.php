<div>
    @if (Session::has('message'))
    <div class="container">
        <div class="row alert alert-success ">
            <div class="col-12">
                <ul>
                    <li>{{ Session::get('message') }}</li>
                </ul>
            </div>
        </div>
    </div>
    @endif
    <div class="container container-form rounded-5 py-4 shadow">
        <div class="row justify-content-start justify-content-md-center p-2">
            <div class="col-12 col-md-9 col-lg-7 div-form p-3 p-sm-4 rounded-4 shadow">
                <form wire:submit='create'>

                    <div class="col-12">
                        <label for="name" class="form-label mt-2 mb-1">{{__('ui.titoloAnnuncio')}}</label>
                        <input type="text"
                        class="
                        form-control border
                        @error('name')
                        is-invalid
                        @enderror
                        "
                        id="name" wire:model.live.blur='name'>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 d-flex flex-column flex-sm-row justify-content-between">
                        <div class="col-8">
                            <label for="category" class="form-label mt-2 mb-1">{{__('ui.categoria')}}</label>
                            <select
                            class="
                            form-control
                            @if (Session::has('category_id_error')) is-invalid @endif
                            "
                            id="category" wire:model.live.blur='category_id'>
                            <option value="0">{{__('ui.selectCategoria')}}</option>
                            @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{__("ui.$category->name")}}</option>
                            @endforeach
                            </select>
                        @if (Session::has('category_id_error'))
                        <div class="alert alert-danger">{{ Session::get('category_id_error') }}</div>
                        @endif
                        </div>
                        <div class="col-3">
                            <label for="price" class="form-label mt-2 mb-1">{{__('ui.prezzo')}} (€)</label>
                            <input type="number"
                            class="
                            form-control
                            @error('price')
                            is-invalid
                            @enderror
                            "
                            id="price" wire:model.live.blur='price'></input>
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="description" class="form-label mt-2 mb-1">{{__('ui.descrizione')}}</label>
                        <textarea
                        class="
                        form-control
                        @error('description')
                        is-invalid
                        @enderror
                        "
                        id="description" rows="3" wire:model.live.blur='description'></textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 d-flex flex-column">
                        <label for="img" class="form-label mt-2 mb-1">{{__('ui.insertPhoto')}}</label>
                        <input class="form-control mb-2" type="file" multiple wire:model="imgs">
                        @if ($imgs)
                            @foreach ($imgs as $key => $img)

                                Photo Preview:
                                <img class="mt-2" src="{{ $img->temporaryUrl() }}">
                                <button class="btn btn-dettagli text-light rounded-pill mt-1" type="button" wire:click="delete({{$key}})">{{__('ui.elimina')}}</button>
                            @endforeach
                        @endif
                        @error('photo') <span class="error">{{ $message }}</span> @enderror

                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-custom-color1 text-color3 rounded-pill mt-3">{{__('ui.creaAnnuncio')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
