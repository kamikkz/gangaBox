<div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand">TEST</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/categorias') }}">Categorías</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/productos') }}">Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/operations') }}">Orden de Productos</a>
              </li>
            @foreach ($categorias as $categoria)
            <li class="nav-item">
                <a class="nav-link" wire:click="show({{$categoria->id}})" href="#">{{$categoria->categoryName}}</a>
            </li>
            @endforeach
        </ul>
      </div>
    </div>
  </nav>
</div>
