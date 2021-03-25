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
    public $oldProducts;
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
                $oldProduct=Producto::where('categoria_id', (int)$categoria->id)->where('productCode', $row[1])->first();
                if($oldProduct == null){
                    $producto = Producto::create([
                        'productName'=> 'New ',
                        'productPrice'=> 0.0,
                        'productImgUrl'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/d/da/Imagen_no_disponible.svg/1200px-Imagen_no_disponible.svg.png',
                        'productCode'=>$row[1],
                        'productPosition'=>$row[2],
                        'categoria_id'=>$categoria->id
                    ]);
                    $this->producto = $producto;
                } else if($oldProduct->productPosition != $row[2]){
                    $oldProduct->update([
                        'productName'=> 'Updated ',
                        'productPrice'=> 99.95,
                        'productImgUrl'=>'https://thumbs.dreamstime.com/z/sello-actualizado-en-espa%C3%B1ol-125390697.jpg',
                        'productCode'=>$row[1],
                        'productPosition'=>$row[2],
                        'categoria_id'=>$categoria->id
                    ]);
                    $this->producto = $oldProduct;
                }
            } else {
                Categoria::firstOrCreate([
                    'categoryName' => $row[0],
                ]);
            }
        }
    }
}
