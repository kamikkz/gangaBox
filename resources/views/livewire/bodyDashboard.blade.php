<div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 class="display-3">Test gangaBox</h1>
      <p class="lead">{{$categoria_categoryName}}</p>
    </header>
    <div class="row text-center">
        @forelse ($productos as $producto)
        <div class="col col-xs-3 col-sm-3 col-md-3">
            <img class="card-img-top" src="{{$producto->productImgUrl}}"
                    alt="{{$producto->productImgUrl}}"
                    width="200" height="200" />
           <div class="card-body">
                <h4 class="card-title">{{$producto->productName}}</h4>
                <p class="card-text">${{$producto->productPrice}}</p>
            </div>
            <div class="card-footer">
                <h4 class="card-title">Posición: {{$producto->productPosition}}</h4>
                <p class="card-text">:Código {{$producto->productCode}}</p>
            </div>
        </div>
        @empty
            <h2>No Data Found </h2>
        @endforelse

    </div>

</div>
