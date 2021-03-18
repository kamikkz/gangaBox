<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Categoria;

class CategoriaComponent extends Component
{
    use WithPagination;

    public $categoryName;
    public $view = 'createCategoria';

    public function render()
    {
        return view('livewire.categoria-component',[
            'categorias' => Categoria::orderBy('id','asc')->paginate()
        ]);
    }

    public function store()
    {
        $this->validate([
            'categoryName'=>'required'
        ]);
        Categoria::create([
            'categoryName'=> $this->categoryName
        ]);
    }

    public function destroy($id)
    {
        Categoria::destroy($id);
    }
}
