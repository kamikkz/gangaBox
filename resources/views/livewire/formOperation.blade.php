<div class="form-group">
    <h2>Load Excel</h2>
    <form wire:submit.prevent="importFormSubmit" enctype="multipart/form-data">
        @csrf
        @if (Session::has('message'))
        <p>{{Session::get('message')}}</p>
        @endif
        <div class="py-3">
            <input wire:model="archivo" class="form-control" type="file"/>
        </div>
        <div class="pt-3">
            <button class="btn btn-block btn-primary" type="submit">
                Cargar Archivo
            </button>
        </div>
    </form>

</div>
