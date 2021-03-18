<div class="form-group">
    <label>Nombre Categoría</label>
        <input type="text" class="form-control" wire:model="categoryName">
        @error('categoryName')
            <span>{{$message}}</span>
        @enderror

</div>
