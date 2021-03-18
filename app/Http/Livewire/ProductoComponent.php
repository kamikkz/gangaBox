<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;
use App\Models\Categoria; //Como catalogo foraneo

class ProductoComponent extends Component
{
    use WithPagination;

    public $productName,$productPrice,$productImgUrl,$productCode,$productPosition,$categoria_id;
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
            'productPosition'=>'required',
            'categoria_id'=>'required'
        ]);
        Producto::create([
            'productName'=> $this->productName,
            'productPrice'=>$this->productPrice,
            'productImgUrl'=>$this->productImgUrl,
            'productCode'=>$this->productCode,
            'productPosition'=>$this->productPosition,
            'categoria_id'=>$this->categoria_id
        ]);
    }

    public function destroy($id)
    {
        Producto::destroy($id);
    }
}
