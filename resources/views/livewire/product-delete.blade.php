<div>
    <button wire:click="deleteProduct({{$product_id}})" wire:confirm="{{__('ui.deleteConfirm')}}" class=" ms-2 btn btn-light bg-transparent border-0 p-0"><span class="fw-bold">{{__('ui.deleteAnnuncio')}}<i class="ps-2 pb-0 text-danger fa-solid fa-xmark icon-anim fs-5"></i></span></button>
</div>
