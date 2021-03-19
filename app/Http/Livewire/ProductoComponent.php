<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;
use App\Models\Categoria; //Como catalogo foraneo

class ProductoComponent extends Component
{
    use WithPagination;

    public $producto_id,$productName,$productPrice,$productImgUrl,$productCode,$productPosition,$categoria_id;
    public $view = 'createProducto';

    public function render()
    {
        return view('livewire.producto-component',[
            'productos' => Producto::orderBy('id','asc')->paginate(),
            'categorias' => Categoria::all()
        ]);
    }

    public function store()
    {
        $this->validate([
            'productName'=>'required',
            'productPrice'=>'required',
            'productImgUrl'=>'required',
            'productCode'=>'required',
            'categoria_id'=>'required'
        ]);
        $productos=Producto::where('categoria_id', $this->categoria_id)->orderBy('productPosition', 'asc')->get();
        $this->normalizar($productos);

        Producto::create([
            'productName'=> $this->productName,
            'productPrice'=>$this->productPrice,
            'productImgUrl'=>$this->productImgUrl,
            'productCode'=>$this->productCode,
            'productPosition'=>count($productos)+1,
            'categoria_id'=>$this->categoria_id
        ]);

        $this->default();
    }

    public function normalizar($productos){
        foreach($productos as $key=>$producto){
            if ($producto->productPosition != ($key)) {
                $editProducto=Producto::find($producto->id);
                    $editProducto->update([
                        'productName'       =>$editProducto->productName,
                        'productPrice'      =>$editProducto->productPrice,
                        'productImgUrl'     =>$editProducto->productImgUrl,
                        'productCode'       =>$editProducto->productCode,
                        'productPosition'   =>$key+1,
                        'categoria_id'      =>$editProducto->categoria_id
                    ]);
            }
        }
    }

    public function edit($id)
    {
        $producto=Producto::find($id);
        $this->producto_id = $producto->id;
        $this->productName = $producto->productName;
        $this->productPrice = $producto->productPrice;
        $this->productImgUrl = $producto->productImgUrl;
        $this->productCode = $producto->productCode;
        $this->productPosition = $producto->productPosition;
        $this->categoria_id = $producto->categoria_id;
        $this->view = 'editProducto';
    }

    public function update()
    {
        $this->validate([
            'productName'=>'required',
            'productPrice'=>'required',
            'productImgUrl'=>'required',
            'productCode'=>'required',
            'productPosition'=>'required|integer|gt:0',
            'categoria_id'=>'required'
        ]);

        $productosWO=Producto::where('id', '!=' , $this->producto_id)->where('categoria_id', $this->categoria_id)->orderBy('productPosition', 'asc')->get();
        foreach($productosWO as $productoWO){
            if ($productoWO->productPosition == $this->productPosition) {
                $producto=Producto::find($this->producto_id);
                $producto->update([
                    'productName'=> $this->productName,
                    'productPrice'=>$this->productPrice,
                    'productImgUrl'=>$this->productImgUrl,
                    'productCode'=>$this->productCode,
                    'productPosition'=>$this->productPosition,
                    'categoria_id'=>$this->categoria_id
                ]);
                $posiciones=Producto::where('productPosition', '>=' , $this->productPosition)->where('categoria_id', $this->categoria_id)->orderBy('productPosition', 'asc')->get();
                foreach($posiciones as $posicion){
                    if($posicion->id!=$this->producto_id){
                        $nvaPosicion=Producto::find($posicion->id);
                        $nvaPosicion->update([
                            'productName'       =>$nvaPosicion->productName,
                            'productPrice'      =>$nvaPosicion->productPrice,
                            'productImgUrl'     =>$nvaPosicion->productImgUrl,
                            'productCode'       =>$nvaPosicion->productCode,
                            'productPosition'   =>$nvaPosicion->productPosition+1,
                            'categoria_id'      =>$nvaPosicion->categoria_id
                        ]);
                    }
                }

            }
        }
        $producto=Producto::find($this->producto_id);
        $producto->update([
            'productName'=> $this->productName,
            'productPrice'=>$this->productPrice,
            'productImgUrl'=>$this->productImgUrl,
            'productCode'=>$this->productCode,
            'productPosition'=>$this->productPosition,
            'categoria_id'=>$this->categoria_id
        ]);
        $auxReorder=Producto::where('categoria_id', $this->categoria_id)->orderBy('productPosition', 'asc')->get();
        $this->normalizar($auxReorder);
        $this->default();
    }

    public function destroy($id)
    {
        $producto=Producto::find($id);
        Producto::destroy($id);
        $productos=Producto::where('categoria_id', $producto->categoria_id)->orderBy('productPosition', 'asc')->get();
        $this->normalizar($productos);
    }

    public function default()
    {
        $this->productName='';
        $this->productPrice='';
        $this->productImgUrl='';
        $this->productCode='';
        $this->categoria_id='';
        $this->view = 'createProducto';
    }
}
