<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;
use App\Models\Categoria;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CategoriaExcelImports;
use Livewire\WithFileUploads;

class OperationComponent extends Component
{
    use WithFileUploads;
    public $view = 'formOperation';
    public $archivo;

    public function render()
    {
        return view('livewire.operation-component',[
            'productos' => Producto::orderBy('id','asc')->paginate()
        ]);
    }

    public function importFormSubmit()
    {
        return Excel::import(new CategoriaExcelImports,$this->archivo);
    }

}
