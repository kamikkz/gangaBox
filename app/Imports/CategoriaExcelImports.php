<?php

namespace App\Imports;

use App\Models\Categoria;
use App\Models\Producto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;

class CategoriaExcelImports implements OnEachRow
{
    //use Importable;

    public $categorias,$producto;
    public $auxCont,$newCategory;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row      = $row->toArray();

        $this->auxCont = 0;
        $categorias=Categoria::all();
        foreach($categorias as $categoria){
            if ($categoria->categoryName == $row[0]) {

                $producto = Producto::create([
                    'productName'=> 'TEST',
                    'productPrice'=> 0.0,
                    'productImgUrl'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/d/da/Imagen_no_disponible.svg/1200px-Imagen_no_disponible.svg.png',
                    'productCode'=>$row[1],
                    'productPosition'=>$row[2],
                    'categoria_id'=>$categoria->id
                ]);
                $this->producto = $producto;
            } else {
                Categoria::firstOrCreate([
                    'categoryName' => $row[0],
                ]);
            }
        } //Valida foreach
        /*if($this->auxCont>0){
            $nvaCategoria = Categoria::firstOrCreate([
                'categoryName' => $row[0],
            ]);
        }*/


    }
}
