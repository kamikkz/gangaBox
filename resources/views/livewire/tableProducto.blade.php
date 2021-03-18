<h2>Listado de Productos</h2>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre Producto</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Código</th>
            <th>Posición</th>
            <th>Categoría</th>
            <th class="col-span-2">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($productos as $producto)
            <tr>
                <td>{{$producto->id}}</td>
                <td>{{$producto->productName}}</td>
                <td>{{$producto->productPrice}}</td>
                <td>
                    <img src="{{$producto->productImgUrl}}"
                    alt="{{$producto->productImgUrl}}"
                    width="200" height="200" />
                </td>
                <td>{{$producto->productCode}}</td>
                <td>{{$producto->productPosition}}</td>
                <td>{{$producto->categoria_id}}</td>
                <td>
                    <button  wire:click="modify({{$producto->id}})" class="btn btn-primary" >
                        Editar
                    </button>
                </td>
                <td>
                    <button  wire:click="destroy({{$producto->id}})" class="btn btn-danger" >
                        Eliminar
                    </button>
                </td>
            </tr>
        @empty
            <h2>No Data Found </h2>
        @endforelse
    </tbody>
</table>
{{$productos->links()}}
