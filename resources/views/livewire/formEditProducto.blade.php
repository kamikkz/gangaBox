<div class="form-group">
    <label>Nombre Producto</label>
        <input type="text" class="form-control" wire:model="productName">
        @error('productName')
            <span>{{$message}}</span>
        @enderror

        <label>Precio</label>
        <input type="number" class="form-control" wire:model="productPrice">
        @error('productPrice')
            <span>{{$message}}</span>
        @enderror

        <label>Url Imagen</label>
        <input type="text" class="form-control" wire:model="productImgUrl">
        @error('productImgUrl')
            <span>{{$message}}</span>
        @enderror

        <label>Código</label>
        <input type="text" class="form-control" wire:model="productCode">
        @error('productCode')
            <span>{{$message}}</span>
        @enderror

        <label>Posición</label>
        <input type="number" class="form-control" wire:model="productPosition">
        @error('productPosition')
            <span>{{$message}}</span>
        @enderror

        <label>categoria_id</label>
        <select class="form-control" wire:model="categoria_id">
            <option selected value=""> -- select an option -- </option>
            @foreach($categorias as $categoria)
            <option value="{{$categoria->id}}" >{{$categoria->categoryName}}</option>
            @endforeach
            </select>
        @error('categoria_id')
            <span>{{$message}}</span>
        @enderror

</div>
