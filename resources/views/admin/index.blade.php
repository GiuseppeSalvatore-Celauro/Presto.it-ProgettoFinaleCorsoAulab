<x-layout>
    <div class="container">
        <div class="row justify-content-center text-center">
            <x-header title='{{__('ui.adminDash')}}'/>
        </div>
    </div>
    @if(Session('message'))
        <div class="container">
            <div class="row alert alert-success">
                <div class="col-12">
                    <ul>
                        <li>
                            {{Session("message")}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <livewire:user-table/>
</x-layout>