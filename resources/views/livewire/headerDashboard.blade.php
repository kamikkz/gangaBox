<div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand">JORGE SUAREZ</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            @foreach ($categorias as $categoria)
            <li class="nav-item">
                <button wire:click="show({{$categoria->id}})" class="btn btn-outline-warning" >
                    {{$categoria->categoryName}}
                </button>
            </li>
            @endforeach
          <li class="nav-item">
            <a class="nav-link" href="#">Categorías</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Orden de Productos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
