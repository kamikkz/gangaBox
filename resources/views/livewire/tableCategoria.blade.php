<h2>Listado de Categorias</h2>
<button  wire:click="export()" class="btn btn-dark btn-block" >
    Exportar
</button>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre Categoria</th>
            <th class="col-span-2">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($categorias as $categoria)
            <tr>
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->categoryName}}</td>
                <td>
                    <button  wire:click="edit({{$categoria->id}})" class="btn btn-primary" >
                        Editar
                    </button>
                </td>
                <td>
                    <button  wire:click="destroy({{$categoria->id}})" class="btn btn-danger" >
                        Eliminar
                    </button>
                </td>
            </tr>
        @empty
            <h2>No Data Found </h2>
        @endforelse
    </tbody>
</table>
{{$categorias->links()}}
