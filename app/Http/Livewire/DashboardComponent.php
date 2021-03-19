<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;

class DashboardComponent extends Component
{
    public $producto_id,$productName,$productPrice,$productImgUrl,$productCode,$productPosition;
    public $categoria_id, $categoryName;
    public $categoria_categoryName, $productos;
    public $view = 'headerDashboard';

    public function render()
    {
        return view('livewire.dashboard-component',[
            'categorias' => Categoria::all()
        ]);
    }

    public function show($id)
    {
        $categoria = Categoria::find($id);
        $productos = Producto::where('categoria_id', $id)->orderBy('productPosition', 'asc')->get();
        //$productos = $categoria->productos;
        $this->categoria_categoryName = $categoria->categoryName;
        $this->productos = $productos;
        $this->view = 'bodyDashboard';
    }

}
