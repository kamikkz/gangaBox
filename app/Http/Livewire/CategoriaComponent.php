<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Categoria;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoriaExcelExports;

class CategoriaComponent extends Component
{
    use WithPagination;

    public $categoria_id, $categoryName;
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
        $this->default();
    }

    public function edit($id)
    {
        $categoria=Categoria::find($id);
        $this->categoria_id = $categoria->id;
        $this->categoryName = $categoria->categoryName;
        $this->view = 'editCategoria';
    }

    public function update()
    {
        $this->validate([
            'categoryName'=>'required'
        ]);
        $categoria=Categoria::find($this->categoria_id);
        $categoria->update([
            'categoryName'=> $this->categoryName
        ]);
        $this->default();
    }

    public function destroy($id)
    {
        Categoria::destroy($id);
    }

    public function default()
    {
        $this->categoryName = '';
        $this->view = 'createCategoria';
    }

    public function export()
    {
        return Excel::download(new CategoriaExcelExports,'categorias.xlsx');
    }
}
