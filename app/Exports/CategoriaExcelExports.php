<?php

namespace App\Exports;

use App\Models\Categoria;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class CategoriaExcelExports implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //$categorias=Categoria::all();
        $categorias = DB::table('categorias')->orderBy('categoryName')
            ->leftJoin('productos', 'categorias.id', '=', 'productos.categoria_id')
            ->select('categoryName','productName','productCode','productPosition')
            ->orderBy('productPosition', 'asc')
            ->get();
        return $categorias;
    }
}
