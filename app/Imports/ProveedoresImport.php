<?php

namespace App\Imports;

use App\Proveedor;
use Maatwebsite\Excel\Concerns\ToModel;

class ProveedoresImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Proveedor([
            'nombre'     => $row[0],
            'rfc'    => $row[1],
            'email' => $row[2],
        ]);
    }
}
