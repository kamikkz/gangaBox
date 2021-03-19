<h2>Listado de Productos</h2>
<table class="table">
    <thead>
        <tr>
            <th>Categoría</th>
            <th>Código</th>
            <th>Posición</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($productos as $producto)
            <tr>
                <td>{{$producto->categoria->categoryName}}</td>
                <td>{{$producto->productCode}}</td>
                <td>{{$producto->productPosition}}</td>
            </tr>
        @empty
            <h2>No Data Found </h2>
        @endforelse
    </tbody>
</table>
{{$productos->links()}}
